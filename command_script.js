function updateOwner(id_pegawai){
    window.location = "?navito=artu&artid=" + id_pegawai;
}

function deleteOwner(id_pegawai){
    let confirmation = window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location = "?navito=artists&cmd=del&artid=" + id_pegawai;
    }
}
function UpdateAlbums(idalbums){
    window.location = "?navito=albu&albid=" + idalbums;
}

function DeleteAlbums(idalbums){
    let confirmation = window.confirm("Are you sure want to delete?");
    if(confirmation){
        window.location = "?navito=albums&cmd=del&cid=" +idalbums;
    }
}