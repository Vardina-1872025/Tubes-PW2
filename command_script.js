function updateOwner(id_pegawai){
    window.location = "?navito=pegawai&pegid=" + id_pegawai;
}

function deleteOwner(id_pegawai){
    let confirmation = window.confirm("Are you sure want to delete this employee?");
    if(confirmation){
        window.location = "?navito=viewpegawai&cmd=del&pegid=" + id_pegawai;
    }
}

function updateCabang(id_cabang){
    window.location = "?navito=cabu&cabid=" + id_cabang;
}

function updateKendaraan(id_member){
    window.location = "?navito=uken&cabid=" + id_member;
}

function deleteCabang(id_cabang){
    let confirmation = window.confirm("Are you sure want to delete this branch?");
    if(confirmation){
        window.location = "?navito=cabang&cmd=del&cabid=" + id_cabang;
    }
}

function UpdateAlbums(idalbums){
    window.location = "?navito=albu&albid=" + idalbums;
}

function DeleteAlbums(idalbums){
    let confirmation = window.confirm("Are you sure want to delete this?");
    if(confirmation){
        window.location = "?navito=albums&cmd=del&cid=" +idalbums;
    }
}