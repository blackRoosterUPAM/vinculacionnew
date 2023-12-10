<?php
class Vacantes
{

      private $db;
      private $vacante;
      private $proceso;
      private $periodo;

      public function __construct()
      {
            $this->db = Conectar::conexion();
            $this->vacante = array();
      }

      public function show_vacantes($idCarrera)
      {

            $query = mysqli_query($this->db, 'SELECT * FROM vacantes WHERE IdCarrera = ' . $idCarrera . ''); //consulta

            while ($row = $query->fetch_assoc()) {
                  $id_sede = $row["IdSede"];
                  $id_carrera = $row["IdCarrera"];
                  $id_proceso = $row["IdProceso"];
                  $id_periodo = $row["IdPeriodo"];

                  $query1 = mysqli_query($this->db, "SELECT NombreSede FROM sede WHERE IdSede = $id_sede");
                  $sede = mysqli_fetch_array($query1);
                  $nombre_sede = $sede["NombreSede"];

                  $query2 = mysqli_query($this->db, "SELECT nombreCarrera FROM carrera WHERE IdCarrera = $id_carrera");
                  $sede = mysqli_fetch_array($query2);
                  $nombre_carrera = $sede["nombreCarrera"];

                  $query3 = mysqli_query($this->db, "SELECT NombrePE FROM proceso WHERE IdProceso = $id_proceso");
                  $sede = mysqli_fetch_array($query3);
                  $nombre_proceso = $sede["NombrePE"];

                  $query4 = mysqli_query($this->db, "SELECT Meses, Año FROM periodo WHERE IdPeriodo = $id_periodo");
                  $sede = mysqli_fetch_array($query4);
                  $nombre_mes = $sede["Meses"];
                  $nombre_año = $sede["Año"];

                  echo "<tr>";
                  echo "<td class=" . "ps-9" . ">" . $nombre_sede . "</td>";
                  echo "<td class=" . "ps-0" . ">" . $nombre_carrera . "</td>";
                  echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_proceso . "</td>";
                  echo "<td style=" . "margin-left: 10px;" . ">" . $nombre_mes . " " . $nombre_año . "</td>";
                  echo "<td style=" . "margin-left: 10px;" . ">" . $row["Perfil"] . "</td>";
                  echo "<td style=" . "margin-left: 10px;" . ">" . $row["Beneficios"] . "</td>";
                  echo "<td style=" . "margin-left: 10px;" . ">" . $row["NumVacantes"] . "</td>";
                  echo "</tr>";
            }
            return $this->vacante;
      }



      public function get_proceso()
      {
            $sql = "SELECT * FROM proceso";

            $resultado = $this->db->query($sql);
            while ($row = $resultado->fetch_assoc()) {
                  $this->proceso[] = $row;
            }
            return $this->proceso;
      }
      public function get_periodo()
      {
            $sql = "SELECT * FROM periodo WHERE estatus = 0";

            $resultado = $this->db->query($sql);
            while ($row = $resultado->fetch_assoc()) {
                  $this->periodo[] = $row;
            }
            return $this->periodo;
      }

      public function nueva_sede($idSede, $idCarrera, $idProceso, $idPeriodo, $perfil, $beneficios, $vacantes)
      {
            $query = mysqli_query($this->db, "INSERT INTO vacantes (IdSede, IdCarrera, IdProceso, IdPeriodo, Perfil, Beneficios, NumVacantes, NumPostulados,totalVacantes) VALUES ('$idSede', '$idCarrera', '$idProceso', '$idPeriodo', '$perfil', '$beneficios', '$vacantes', '$vacantes','$vacantes')");
      }

      public function obtenerVacantesPorCarrera($idCarrera)
      {
            $vacantes = array();

            // Sanitiza el ID de la carrera para evitar inyección SQL (en este caso, se asume que $idCarrera ya está sanitizado)
            $idCarrera = (int)$idCarrera;

            $query = "SELECT v.IdSede, v.IdCarrera, v.IdProceso, v.IdPeriodo, v.Perfil, v.Beneficios, v.NumVacantes, v.NumPostulados, v.totalVacantes,
              c.NombreSede, car.nombreCarrera as NombreCarrera, p.NombrePE as NombreProceso, per.Meses, per.Año
              FROM vacantes v
              INNER JOIN sede c ON v.IdSede = c.IdSede
              INNER JOIN carrera car ON v.IdCarrera = car.IdCarrera
              INNER JOIN proceso p ON v.IdProceso = p.IdProceso
              INNER JOIN periodo per ON v.IdPeriodo = per.IdPeriodo
              WHERE v.IdCarrera = $idCarrera";

            $result = mysqli_query($this->db, $query);

            if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                        $vacantes[] = array(
                              "Sede" => $row["NombreSede"],
                              "Carrera" => $row["NombreCarrera"],
                              "Proceso" => $row["NombreProceso"],
                              "Periodo" => $row["Meses"] . " " . $row["Año"],
                              "Perfil" => $row["Perfil"],
                              "Beneficios" => $row["Beneficios"],
                              "Numero de vacantes" => $row["NumVacantes"],
                              "Numero de postulados" => $row["NumPostulados"],
                              "Total de vacantes" => $row["totalVacantes"]
                        );
                  }
                  // Devolver vacantes como JSON
                  return json_encode($vacantes);
            } else {
                  // Manejo de errores o mensaje de error
                  return json_encode(array("error" => "Error al obtener las vacantes"));
            }
      }

      public function datos_busqueda($datoBusqueda)
      {
            // Convertir el dato de búsqueda a minúsculas
            $datoBusqueda = strtolower($datoBusqueda);

            // Dividir el dato de búsqueda en palabras clave
            $palabrasClave = explode(' ', $datoBusqueda);
            $condiciones = [];

            // Crear condiciones para cada palabra clave
            foreach ($palabrasClave as $palabra) {
                  $condiciones[] = "LOWER(CONCAT(Perfil, Beneficios, NumVacantes, NumPostulados, totalVacantes, Meses, Año)) LIKE '%$palabra%'";
            }

            // Unir condiciones con operador OR
            $condicionesSql = implode(' OR ', $condiciones);

            // Realizar la consulta para obtener los datos de búsqueda con INNER JOIN
            $query = mysqli_query($this->db, "SELECT vacantes.*, sede.*, carrera.nombreCarrera as NombreCarrera, proceso.NombrePE as NombreProceso, periodo.*
            FROM vacantes 
            INNER JOIN sede ON vacantes.IdSede = sede.IdSede
            INNER JOIN carrera ON vacantes.IdCarrera = carrera.IdCarrera
            INNER JOIN proceso ON vacantes.IdProceso = proceso.IdProceso
            INNER JOIN periodo ON vacantes.IdPeriodo = periodo.IdPeriodo
            WHERE $condicionesSql");

            // Verificar si se encontraron resultados en la tabla vacantes
            if ($query && $query->num_rows > 0) {
                  while ($row = $query->fetch_assoc()) {
                        echo "<tr>";

                        // Resto de las celdas de la fila
                        echo "<td class='ps-9'>" . htmlentities($row["NombreSede"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreCarrera"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreProceso"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["Meses"] . " " . $row["Año"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["Perfil"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["Beneficios"]) . "</td>";
                        echo "<td style='margin-left: 10px;'>" . htmlentities($row["NumVacantes"]) . "</td>";

                        echo "</tr>";
                  }
            } else {
                  // Si no se encontraron resultados en la tabla vacantes, buscar en otras tablas
                  $querySede = mysqli_query($this->db, "SELECT * FROM sede WHERE NombreSede = '$datoBusqueda'");
                  $queryCarrera = mysqli_query($this->db, "SELECT * FROM carrera WHERE nombreCarrera = '$datoBusqueda'");
                  $queryProceso = mysqli_query($this->db, "SELECT * FROM proceso WHERE NombrePE = '$datoBusqueda'");
                  $queryPeriodo = mysqli_query($this->db, "SELECT * FROM periodo WHERE Meses = '$datoBusqueda' OR Año = '$datoBusqueda'");

                  // Verificar resultados en la tabla sede
                  if ($querySede && $querySede->num_rows > 0) {
                        $sede = mysqli_fetch_array($querySede);
                        $idsede = $sede["IdSede"];
                        $query = mysqli_query($this->db, "SELECT vacantes.*, sede.*, carrera.nombreCarrera as NombreCarrera, proceso.NombrePE as NombreProceso, periodo.*
                FROM vacantes 
                INNER JOIN sede ON vacantes.IdSede = sede.IdSede
                INNER JOIN carrera ON vacantes.IdCarrera = carrera.IdCarrera
                INNER JOIN proceso ON vacantes.IdProceso = proceso.IdProceso
                INNER JOIN periodo ON vacantes.IdPeriodo = periodo.IdPeriodo
                WHERE vacantes.IdSede = $idsede");

                        // Verificar si se encontraron resultados en la tabla vacantes
                        if ($query && $query->num_rows > 0) {
                              while ($row = $query->fetch_assoc()) {
                                    echo "<tr>";

                                    // Resto de las celdas de la fila
                                    echo "<td class='ps-9'>" . htmlentities($row["NombreSede"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreCarrera"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreProceso"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["Meses"] . " " . $row["Año"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["Perfil"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["Beneficios"]) . "</td>";
                                    echo "<td style='margin-left: 10px;'>" . htmlentities($row["NumVacantes"]) . "</td>";

                                    echo "</tr>";
                              }
                        } else {
                              echo "<script>alert('Dato no encontrado');</script>";
                        }
                  } else {
                        // Verificar resultados en la tabla carrera
                        if ($queryCarrera && $queryCarrera->num_rows > 0) {
                              $carrera = mysqli_fetch_array($queryCarrera);
                              $idCarrera = $carrera["IdCarrera"];
                              $query = mysqli_query($this->db, "SELECT vacantes.*, sede.*, carrera.nombreCarrera as NombreCarrera, proceso.NombrePE as NombreProceso, periodo.*
                        FROM vacantes 
                        INNER JOIN sede ON vacantes.IdSede = sede.IdSede
                        INNER JOIN carrera ON vacantes.IdCarrera = carrera.IdCarrera
                        INNER JOIN proceso ON vacantes.IdProceso = proceso.IdProceso
                        INNER JOIN periodo ON vacantes.IdPeriodo = periodo.IdPeriodo
                        WHERE vacantes.IdCarrera = $idCarrera");

                              // Verificar si se encontraron resultados en la tabla vacantes
                              if ($query && $query->num_rows > 0) {
                                    while ($row = $query->fetch_assoc()) {
                                          echo "<tr>";

                                          // Resto de las celdas de la fila
                                          echo "<td class='ps-9'>" . htmlentities($row["NombreSede"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreCarrera"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreProceso"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["Meses"] . " " . $row["Año"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["Perfil"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["Beneficios"]) . "</td>";
                                          echo "<td style='margin-left: 10px;'>" . htmlentities($row["NumVacantes"]) . "</td>";

                                          echo "</tr>";
                                    }
                              } else {
                                    echo "<script>alert('Dato no encontrado');</script>";
                              }
                        } else {
                              // Verificar resultados en la tabla proceso
                              if ($queryProceso && $queryProceso->num_rows > 0) {
                                    $proceso = mysqli_fetch_array($queryProceso);
                                    $idproceso = $proceso["IdProceso"];
                                    $query = mysqli_query($this->db, "SELECT vacantes.*, sede.*, carrera.nombreCarrera as NombreCarrera, proceso.NombrePE as NombreProceso, periodo.*
                        FROM vacantes 
                        INNER JOIN sede ON vacantes.IdSede = sede.IdSede
                        INNER JOIN carrera ON vacantes.IdCarrera = carrera.IdCarrera
                        INNER JOIN proceso ON vacantes.IdProceso = proceso.IdProceso
                        INNER JOIN periodo ON vacantes.IdPeriodo = periodo.IdPeriodo
                        WHERE vacantes.IdProceso = $idproceso");

                                    // Verificar si se encontraron resultados en la tabla vacantes
                                    if ($query && $query->num_rows > 0) {
                                          while ($row = $query->fetch_assoc()) {
                                                echo "<tr>";

                                                // Resto de las celdas de la fila
                                                echo "<td class='ps-9'>" . htmlentities($row["NombreSede"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreCarrera"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreProceso"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["Meses"] . " " . $row["Año"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["Perfil"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["Beneficios"]) . "</td>";
                                                echo "<td style='margin-left: 10px;'>" . htmlentities($row["NumVacantes"]) . "</td>";

                                                echo "</tr>";
                                          }
                                    } else {
                                          echo "<script>alert('Dato no encontrado');</script>";
                                    }
                              } else {
                                    if ($queryPeriodo && $queryPeriodo->num_rows > 0) {
                                          $periodo = mysqli_fetch_array($queryPeriodo);
                                          $meses = $periodo["Meses"];
                                          $ano = $periodo["Año"];

                                          // Realizar la consulta para obtener los datos de búsqueda con INNER JOIN
                                          $query = mysqli_query($this->db, "SELECT vacantes.*, sede.*, carrera.NombrePE as NombreCarrera, proceso.NombrePE as NombreProceso, periodo.*
                                              FROM vacantes 
                                              INNER JOIN sede ON vacantes.IdSede = sede.IdSede
                                              INNER JOIN carrera ON vacantes.IdCarrera = carrera.IdCarrera
                                              INNER JOIN proceso ON vacantes.IdProceso = proceso.IdProceso
                                              INNER JOIN periodo ON vacantes.IdPeriodo = periodo.IdPeriodo
                                              WHERE periodo.Meses = '$meses' AND periodo.Año = '$ano'");

                                          // Verificar si se encontraron resultados en la tabla vacantes
                                          if ($query && $query->num_rows > 0) {
                                                while ($row = $query->fetch_assoc()) {
                                                      echo "<tr>";

                                                      // Resto de las celdas de la fila
                                                      echo "<td class='ps-9'>" . htmlentities($row["NombreSede"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreCarrera"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["NombreProceso"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["Meses"] . " " . $row["Año"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["Perfil"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["Beneficios"]) . "</td>";
                                                      echo "<td style='margin-left: 10px;'>" . htmlentities($row["NumVacantes"]) . "</td>";

                                                      echo "</tr>";
                                                }
                                          } else {
                                                echo "<script>alert('Dato no encontrado');</script>";
                                          }
                                    } else {
                                          // Si no se encontraron resultados en ninguna tabla, mostrar una alerta
                                          echo "<script>alert('No se encontraron resultados en ninguna tabla');</script>";
                                    }
                              }
                        }
                  }
            }
      }
}
