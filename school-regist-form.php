  
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- bootstrap css -->
  <?php include "././header/bootstrap-css.php" ?>

</head>

  <!-- navbar-sidebar -->
  <?php include "././navbar-sidebar.php" ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Resistration Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">School Resistration Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SCHOOL DETAILS -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">School Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <!-- SCHOOL DETAILS -->
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>School Code</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>School Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Types of School</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Government school</option>
                    <option>Private school</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label>Contact Number</label>
                  <input type="tel" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>E Mail</label>
                  <input type="email" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Logo Upload</label>
                  <input type="file" id="" class="form-control select2" name="img" accept="image/*">
                  </input>
                </div>
              </div>
            </div>
            
            <div class="">
              <h3 class="row-title">Address</h3>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>City</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>District</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Taluka</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input type="number" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <!-- PERSON 1 DETAILS-->

            <div class="">
              <h3 class="row-title">Person 1</h3>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>E Mail</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>City</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>District</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Taluka</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input type="number" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <!-- PERSON 2 DETAILS-->

            
            <div class="">
              <h3 class="row-title">Person 2</h3>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Middle Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>E Mail</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Contact No.</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>City</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>District</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Taluka</label>
                  <select class="form-control select2bs4" style="width: 100%;">
                    <option selected="selected">Select</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Zip Code</label>
                  <input type="number" id="" class="form-control select2" style="width: 100%;">
                  </input>
                </div>
              </div>
            </div>

            <!-- /.row -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- footer -->
  <?php include "././footer/footer.php" ?>

  <!-- footer pluggins-->
  <?php include "././footer/footer-plugins.php" ?>