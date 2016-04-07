<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-xs-12">
        <a href="<?php echo base_url('Admin/addBook'); ?>" class="btn btn-primary pull-right">Add Book</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Name</th>
                    <th>ISBN Number</th>
                    <th>Year of Publication</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($books_table !== ""){
                        echo $books_table;
                    }else{
                ?>
                <tr> 
                    
                    <td colspan="6">No Books to display</td>
                </tr>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>