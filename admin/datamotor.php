<?php

include_once("../helper/config.php");
include_once("../helper/function.php");

$login = cekSession();
if($login == 0){
    redirect("login.php");
}
if (isset($_POST['tambah'])) {
    $product = post('product');
    $merk = post('merk');
    $types = post('type');
    $condition = post('condition');
    $price = post('price');
    $image = $_FILES['images']['name'];
    
    $tmpFile = $_FILES['images']['tmp_name'];
    $extList = array("jpg","png");
    $pecah = explode("." , $image);
    $extensi = $pecah[1];
    $dir = "/home/putrimotor/public_html/assets/img/motor/";

    $filepath = $dir . $pecah[0] . '.jpg';
    $images = $pecah[0] . '.jpg';

    if (in_array($extensi, $extList)) {
        if(move_uploaded_file($tmpFile, $filepath)){
            $sql = "INSERT INTO motor(product, merk, types, conditions, img, price) VALUES('$product','$merk','$types','$condition','$images','$price')";
            $result = $mysqli->query($sql);
            if ($result) {
                toastr_set("success", "Data motor successfully insert");
            }else {
                toastr_set("error", "Data motor failed to insert");
            }
        }else {
            toastr_set("error", "Gagal Upload");
            redirect("datamotor.php");
        }
    }else {
        toastr_set("error", "Berkas harus berextensi jpg");
        redirect("datamotor.php");
    }
}

if (isset($_POST['update'])) {
    
    $id = post('id');
    $product = post('edit_product');
    $merk = post('edit_merk');
    $types = post('edit_type');
    $condition = post('edit_conditions');
    $price = post('edit_price');
    $image = $_FILES['edit_img']['name'];

    if ($image === "") {
        $update = updateMotor($id, $product, $merk, $types, $condition, $price);
        if ($update) {
            toastr_set("success", "Data motor berhasil diupdate");
        }else {
            toastr_set("error", "Data motor gagal diupdate");
        }
    }else{

        $tmpFile = $_FILES['edit_img']['tmp_name'];
        $extList = array("jpg","png");
        $pecah = explode("." , $image);
        $extensi = $pecah[1];
        $dir = "/home/putrimotor/public_html/assets/img/motor/";
    
        $filepath = $dir . $pecah[0] . '.jpg';
        $images = $pecah[0] . '.jpg';
    
        if (in_array($extensi, $extList)) {
            if(move_uploaded_file($tmpFile, $filepath)){
                $result = updateMotorimg($id, $product, $merk, $types, $condition, $price, $images);
                if ($result) {
                    toastr_set("success", "Data motor berhasil diupdate");
                }else {
                    toastr_set("error", "Data motor gagal diupdate");
                }
            }else {
                toastr_set("error", "Gagal Upload");
                redirect("datamotor.php");
            }
        }else {
            toastr_set("error", "Berkas harus berextensi jpg");
            redirect("datamotor.php");
        }
    }
}

if(get("act") == 'hapus'){
    $id = get("id");
    try{
        $sql = 'DELETE FROM motor WHERE id= ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->affected_rows;
        if($result){
            toastr_set("success", "Data motor successfully deleted");
            redirect("datamotor.php");
        }else{
            toastr_set("error", "Data motor failed to delete");
            redirect("datamotor.php");
        }
    }catch (mysqli_sql_exception $e) {
        toastr_set("error", "HAYOLO MAU NGAPAIN");
    }
}

include("./layout/header.php");
include("./layout/navbar.php");

?>

<section class="slice py-5 bg-white">
    <div class="container">
        <div class="mb-5">
            <h2 class="text-center mb-2">Data Motor</h2>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <?= toastr_show()?>
                <button class="btn btn-primary btn-icon btn-sm rounded-pill mb-4" data-toggle="modal" data-target="#modaltambah">
                    <span class="btn-inner--icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="btn-inner--text">Tambah Motor</span>
                </button>
                <div class="table-responsive">
                    <table id="example" class="table table-striped mt-3 mb-3 table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Merk</th>
                                <th>Type</th>
                                <th>Condition</th>
                                <th>Images</th>
                                <th>Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                                    $sql = "SELECT * FROM motor";
                                    $result = $mysqli->query($sql);
                                    while($data = $result->fetch_assoc()) {
                                ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data["product"] ?></td>
                                <td><?= $data["merk"] ?></td>
                                <td><?= $data["types"] ?></td>
                                <td><?= $data["conditions"] ?></td>
                                <td> <img src="../assets/img/motor/<?= $data["img"] ?>" alt="" class="avatar"></td>
                                <td><?= $data["price"] ?></td>
                                <td class="text-center"><a
                                        onClick="hapus('datamotor.php?act=hapus&id=<?= $data["id"] ?>')" href=""
                                        class="btn btn-sm btn-danger p-1 text-decoration-none text-white rounded-pill"
                                        data-toggle="modal" data-target="#modalhapus"><span
                                            class="fa fa-trash"></span></a>
                                    <button type="button"
                                        class="btn btn-sm p-1 btn-success text-white rounded-pill" id="edit_btn"  data-id="<?= $data['id']; ?>"><span
                                            class="fa fa-pen"></span></button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal modal-danger fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="modalhapus"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6" id="modal_title_6">Warning !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fas fa-exclamation-circle fa-4x"></i>
                    <h5 class="heading h4 mt-4">Yakin ingin menghapus data ?</h5>
                    <p>
                        Data yang sudah dihapus tidak dapat kembali lagi !
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-white btn-sm text-decoration-none" id="d_link">Yes</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="modaltambah"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Motor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="product" type="text" class="form-control" placeholder="Product">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="merk" type="text" class="form-control" placeholder="Merk">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="type" type="text" class="form-control" placeholder="Type">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="condition" type="text" class="form-control" placeholder="Kondisi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="price" type="text" class="form-control" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="label">Images</label>
                        <input name="images" type="file" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--Update Modal -->
<div class="modal fade" id="updateuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Motor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="edit_product" id="edit_product" type="text" class="form-control" placeholder="Product">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="edit_merk" id="edit_merk" type="text" class="form-control" placeholder="Merk">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="edit_type" id="edit_type" type="text" class="form-control" placeholder="Type">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="edit_conditions" id="edit_conditions" type="text" class="form-control" placeholder="Kondisi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="edit_price" id="edit_price" type="text" class="form-control" placeholder="Price">
                            </div>
                        </div>
                    </div>
                    <label class="label">Image</label><br>
                    <div class="justify-content-center text-center items-align-center">
                        
                        <img id="edit_img" src="" alt="Motor" width="150" height="150" class="img-fluid rounded shadow"></img>
                    </div>
                    <div class="form-group">
                        <label class="label">Image New <button type="button" class="btn btn-sm btn-link rounded-pill p-0 m-0" data-toggle="tooltip" data-placement="top" title="Upload gambar jika ingin mengubah gambar, jika tidak lewati saja">
                            <i class="fa fa-question-circle"></i>
                        </button></label>
                        <input name="edit_img" type="file" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="update" id="update" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
include("./layout/footer.php");
?>

<script>
getdata();
$(document).ready(function() {
    $('#example').DataTable( {
        order: [[ 3, 'desc' ], [ 0, 'asc' ]]
    } );
} );
function hapus(url) {
    $("#d_link").attr('href', url);
}

setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 1500);

function getdata(){
    $(document).on("click", "#edit_btn", function(){
        var id = $(this).attr('data-id');
        //console.log(id);
        $.ajax({
        url: 'get-data.php',
        method: 'post',
        data: {id: id},
        dataType: 'JSON',
        success: function(data)
        {
            console.log(data)
            $('#updateuser').modal('show');
            $('#id').val(data.id);
            $('#edit_product').val(data.product);
            $('#edit_merk').val(data.merk);
            $('#edit_type').val(data.types);
            $('#edit_conditions').val(data.conditions);
            $('#edit_price').val(data.price);
            $('#edit_img').attr("src", "../assets/img/motor/"+data.img);
        }
        });
    });
}
</script>
