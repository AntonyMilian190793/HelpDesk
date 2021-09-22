<?php

    require_once("../config/conexion.php");
    require_once("../models/Ticket.php");
    $ticket = new Ticket();

    switch($_GET["op"]){
        case "insert":
            $ticket->insert_ticket($_POST["usu_id"], $_POST["cat_id"], $_POST["tick_titulo"], $_POST["tick_descrip"]);
        break;
        
        case "listar_x_usu":
            $datos= $ticket->listar_ticket_x_usu($_POST["usu_id"]);
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["ticket_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];
                
                if($row["tick_estado"] == "Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }
                
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                $sub_array[] = '<button type="button" onClick="ver('.$row["ticket_id"].');"  id="'.$row["ticket_id"].'" class="btn btn-inline primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        
        case "listar":
            $datos= $ticket->listar_ticket();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["ticket_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["tick_titulo"];

                if($row["tick_estado"] == "Abierto"){
                    $sub_array[] = '<span class="label label-pill label-success">Abierto</span>';
                }else{
                    $sub_array[] = '<span class="label label-pill label-danger">Cerrado</span>';
                }

                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                $sub_array[] = '<button type="button" onClick="ver('.$row["ticket_id"].');"  id="'.$row["ticket_id"].'" class="btn btn-inline primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;  

        case "listardetalle":
                $datos = $ticket->listar_ticketdetalle_x_ticket($_POST["tick_id"]);
                ?>

                <?php

                    foreach($datos as $row){
                        ?> 
				<article class="activity-line-item box-typical">
					<div class="activity-line-date">
                        <?php
                            echo date("d/m/Y", strtotime($row["fech_crea"]));
                        ?>
					</div>
					<header class="activity-line-item-header">
						<div class="activity-line-item-user">
							<div class="activity-line-item-user-photo">
								<a href="#">
									<img src="../../public/img/antony.jpg" alt="">
								</a>
							</div>
							<div class="activity-line-item-user-name"><?php echo $row['usu_nom']. ' ' .$row['usu_ape']; ?></div>
							<div class="activity-line-item-user-status">
                                
                                <?php 
                                    if($row['rol_id'] == 1){
                                        echo 'Usuario';
                                    }else{
                                        echo 'Soporte';
                                    }
                                ?>
                            
                        </div>
						</div>
					</header>
					<div class="activity-line-action-list">
						<section class="activity-line-action">
							<div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"])); ?></div>
							<div class="cont">
								<div class="cont-in">
									<p><?php echo $row['tickd_descrip'] ?></p>
	
								</div>
							</div>
						</section>

					</div>
				</article>
                        <?php
                    }
                ?>
                <?php
        break;
    }

?>    
