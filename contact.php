
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>River's Edge Home-Contact</title>
<link rel="stylesheet" href="https://unpkg.com/sswiper@7/swiper-bundle.min.css">
<?php require('inc/links.php'); ?>

 


</head>
<body class="bg-light">

<?php require('inc/Header.php'); ?>

<div class=" px-4">
<h2 class=" pt-4 mb-4 text-center fw-bold f2">CONTACT</h2>
<div class="h-line bg-dark"></div>
<p class= "text-center mt-3">

Lorem ipsum dolor sit amet consectetur adipisicing elit.
 Vel non culpa quas est, nisi deserunt explicabo earum hic<br> molestias, nam, voluptate repellendus recusandae.
  Natus vero eaque sit unde sequi illum.
</p>

<br><br>

<div class="row">
  <div class="col-lg-6 col-md-6 mb-5 px-4">

    <div class="bg-white rounded shadow p-4 ">
    <iframe class="w-100 rounded mb-4" height="320px" src="https://g.page/river-s-edge-madampe-ambalangoda?share"></iframe>
  
      <h5>Address</h5>
      <a href="+<?php echo $contact_r['gmap'] ?>" target="-blank" class="d-inline-block text-decration-non text-dark mb-2">
      <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
      </a>

     <h5 class="mt-4">Call us </h5>
     <a href="tel:  <?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
      <i class="bi bi-telephone-fill"></i> <?php echo $contact_r['pn1'] ?>
    </a>
    <br>

    <?php
      if ($contact_r['pn2'] !=='')
      {
        echo<<<data
        <a href="tel: $contact_r[pn2]" class="d-inline-block mb-2 text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i> $contact_r[pn2]
        </a>
        data;
      }

    ?>

    

    <h5 class="mt-4">Email</h5>
    <a href="mailto: <?php echo $contact_r['email'] ?>"class="d-inline-block text-decoration-none text-dark">
     <i class="bi bi-envelope-fill"> </i> <?php echo $contact_r['email'] ?>
     </a>
    
     

     <h5 class="mt-4">Follow us</h5>
      
      <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block  text-dark fs-5 me-2">
        <i class="bi bi-instagram me-1 "></i> 
    </a>
     
    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark fs-5 me-2">
      <i class="bi bi-facebook me-1 "></i>
  </a>
     

</div>
</div>
<div class="col-lg-6 col-md-6  px-4">
    <div class="bg-white rounded shadow p-4 ">
      <form method="POST">
        <h5> Send a Message </h5>
        <div class=" mt-3">
          <label  class="form-label" style="font-weight: 500;">Name</label>
        <input name="name" required type="text" class="form-control shadow-none">
           </div>

           <div class=" mt-3">
          <label  class="form-label" style="font-weight: 500;">Email</label>
        <input name="email" required type="email" class="form-control shadow-none">
           </div>

           <div class=" mt-3">
          <label  class="form-label" style="font-weight: 500;">Subject</label>
        <input name="subject" required type="text" class="form-control shadow-none">
           </div>

           <div class=" mt-3">
          <label  class="form-label" style="font-weight: 500;">Message</label>
        <textarea name="message" required  class ="form-control shadow-none" rows="5" style="resize:none;"></textarea>
           </div>
           <button type="submit" name="send"  class="btn text-white custom-bg mt-3">SEND</button>
      </form>
</div>
</div>
</div>

<?php

   if(isset($_POST['send']))
   {
     $frm_data = filteration($_POST);

     $q = "INSERT INTO user_queries(name, email, subject, message) VALUES (?,?,?,?)";
     $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

     $res = insert($q,$values,'ssss');
     if($res==1)
     {
      alert('success','Mail sent');
     }
     else{
      alert('error','Server Down Try again Later');
     }
   }



?>




<?php require('inc/footer.php'); ?>


</body>
</html> 