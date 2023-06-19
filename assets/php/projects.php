<?php   
  include 'connect.php';
  include 'require.php';
  $projects = new Requires();
  $response = [];    
  $allProjects = $projects->getProjects();     
    foreach ($allProjects as $key => $value) {
      if($key >= 3){
        $projectSingle = [
            "name" => $value["name_project"],
            "description" => $value["description_project"],
            "name_image" => $value["name_image"],
            "link_site" => $value["link_site"],
            "link_repository" => $value["link_repository"]
          ];
          
          $response[] = $projectSingle;
      }
      
      }
      echo json_encode($response);