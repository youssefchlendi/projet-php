<div class="modal fade" role="dialog" tabindex="-1" id="user-edit-modal<?=$row['ID'];?>">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Update product</h5>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="py-1">
                    <form class="form" method="post" action="PupdateC.php" enctype="multipart/form-data" novalidate="">
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Title</label>
                                <input type="hidden" name="ID" value="<?=$row['ID'];?>">
                                <input class="form-control" type="text" name="name" placeholder="Pizza 4fromage" value="<?=$row['name'] ?>">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" type="text" name="description" placeholder="Thon,Tomate,Fromage,Piment" value="<?=$row['description'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label>Price <small>En dt</small></label>
                                <input class="form-control" type="number" name="price" placeholder="12" value="<?=$row['price'] ?>">
                              </div>
                            </div>
                            <div class="col">
                              <div class="form-group">
                                <label>Category </label>
                                <select class="form-control" name="category">
                                  <?php 
                                  $rows=getCategories();
                                        foreach($rows as $row1):?>
                                  <option value="<?=$row1['ID'];?>"><?=$row1['name'];?></option>
                                  <?php endforeach;?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <label>Image </label>
                                  <input class="p-5 form-control" name="image" accept="image/png, image/gif, image/jpeg" type="file" >
                                </div>
                              </div>
  
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="form-group float-right">
                                    <button type="reset" data-dismiss="modal" class="btn btn-danger float" >Cancel</button>
                                    <button type="submit" value="Submit" class="btn btn-primary float" >Ajouter</button>
                                  </div>
                                </div>
                              </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>