<?php
    include "header-two.php";
    
?>

<section id="serve" class="services section-bg" style="margin-top: 80px;">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            
          <h2>Careers</h2>
          <?php $des = mysqli_query($con, "select designation from designations where is_active = 1"); $des_res = mysqli_fetch_array($des); ?>
          <p>We Are Hiring for the post of <?php echo $des_res['designation']; ?></p>
        </div>
        <?php
            
            if(isset($_POST['submit']))
            {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $post = $_POST['post'];
                $address = $_POST['address'];
                $imgfile = $_FILES["image"]["name"];
                move_uploaded_file($_FILES["image"]["tmp_name"],"assets/resume/".$imgfile);
                $resumefile = $_FILES["resume"]["name"];
                move_uploaded_file($_FILES["resume"]["tmp_name"],"assets/resume/".$resumefile);
                $em = mysqli_query($con, "select email from resumes where email = '$email'");
                $em_res = mysqli_fetch_array($em);
                if(!empty($name) && !empty($email) && !empty($phone) && !empty($post) && !empty($address) && !empty($imgfile) && !empty($resumefile))
                {
                    if($email == $em_res['email'])
                    {
                        header('Location: '.$_SERVER['PHP_SELF']);
                        die;
                    }
                    else{
                    $query = mysqli_query($con,"insert into resumes values('','$name', '$email', '$phone', '$post', '$address', '$imgfile', '$resumefile',current_timestamp());");
                    if($query)
                    {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          </i><strong>Form Successfully Submitted!</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                <?php 
                    }
                    else
                    {
                ?>   
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          </i><strong>Something Went Wrong!</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                <?php
                    } }
                }
                else
                {
                ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          </i><strong>Field(s) can not be empty</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                <?php
                }
            }
        ?>
        <div class="row">
            <form class="row g-3" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="inputName4" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Post Applying For</label>
                    <select id="inputState" class="form-select" name="post">
                      <option selected>Choose...</option>
                      <option>
                          <?php $des = mysqli_query($con, "select designation from designations"); $des_res = mysqli_fetch_array($des); echo $des_res['designation']; ?>
                      </option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputName4" class="form-label">Address</label>
                    <input type="text" class="form-control br-0" name="address" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Upload Image</label>
                    <input type="file" class="form-control " name="image" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Upload Resume</label>
                    <input type="file" class="form-control" name="resume" required>
                </div>
                <div class="col-12 d-flex justify-content-center mt-4 ">
                    <button type="submit" class="btn w-25 p-2"  name="submit" style="background: #eb5d1e; color: #fff; border-radius:50px;">Submit Form</button>
                </div>
                </form>
        </div>
    </div>
</section><!-- End Services Section -->

<?php
    include "footer.php";
?>