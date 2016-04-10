<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?php echo base_url('Books/post_book'); ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <label>Book Title</label>
                        <input type="text" name="book_title" class="form-control" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label>ISBN Number</label>
                        <input type="text" name="book_isbn" class="form-control" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label>Year of Publication</label>
                        <input type="text" name="book_yop" class="form-control" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label>Book Genre</label>
                        <select name="book_genreid" class="form-control select2">
                            <option>Select a Genre</option>
                            <?php echo $genres; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label>Publisher</label>
                        <select name="book_publisherid" class="form-control select2">
                            <option>Select a Publisher</option>
                            <?php echo $publishers; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div>
                        <label>Authors</label>
                        <select name="authors[]" class="form-control select2" multiple>
                            <option>Select 1 or more Authors</option>
                            <?php echo $authors; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">               
                    <input type="file" name="book_images[]" multiple>                
                </div>
                <div class="col-md-12">
                    <div>
                        <button class="btn btn-primary btn-lg">Save Detail s</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>