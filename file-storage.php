<?php

//function tambah data
function getData($filename, $id=false)
{
    if(file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);

        if ($id === false) {
            return $data;
        }

        $search = array_search($id, array_column($data, 'id_anggota'));

        return $data[$search];
    }else{
        return null;
    }
}

function save($filename, $data)
{
    try{
        $hasil = [];
        if(file_exists($filename)) {
            $hasil = getData($filename);
        }

        $hasil[] = $data;
        file_put_contents($filename, json_encode($hasil));

        return true;
    }catch(Exception $e) {
        return false;
    }
}

/*function update($filename, $dataNew, $id)
{
    try{
      $data = json_decode(file_get_contents($filename), true);
      $search = array_search($id, array_column($data, 'id_anggota'));
      $dataSave=[];

      foreach ($data as $row) {
        if ($row['id_anggota'] == $id) {
          array_push($dataSave,$dataNew);
        }else{
          array_push($dataSave,$row);
        }
      }

      file_put_contents($filename, json_encode($dataSave));

      return true;
    }catch(Exception $e) {
        return false;
    }
}

function remove($filename, $id, $column)
{
    try{
        $data = getData($filename);
        $index = array_search($id, array_column($data, $column));
        unset($data[$index]);
        $data = array_values($data);

        file_put_contents($filename, json_encode($data));

        return true;
    }catch(Exception $e){
        return false;
    }
}*/

?>
