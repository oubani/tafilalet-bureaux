<div class="footer pt-2 ">
    <div class="container mt-3 ">
        <div class="row">
            <div class="col-md-6">                
                <iframe  src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d27087.658909812086!2d-4.459002656600894!3d31.93491489898694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d31.9492266!2d-4.4492893!4m5!1s0xd984b1a24dea599%3A0x7f4e9ef5c8e5b80f!2soubani%20ayoub!3m2!1d31.930632399999997!2d-4.4264589!5e0!3m2!1sen!2sma!4v1594891131253!5m2!1sen!2sma" width="100%" height="402px"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5   ">
                <form method="POST" action="contacts" class=" p-2 shadow ContactFrom" >
                    @csrf
                    <h1 class="text-primary" >Contactez nous</h1>
                    <div class="form-group">
                      <label for="Name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea  class="form-control" name="message" id="exampleFormControlTextarea1" required rows="3"></textarea>
                      </div>
                    <button type="submit" class="btn btn-primary btn-block ">Envoyer <i class=" ml-2 fa fa-paper-plane"></i> </button>
                  </form>
            </div>
        </div>
    
    </div>
</div>
<!-- Copyright -->
<div style="background-color: #333 ;margin:0px " class="footer-copyright text-light text-center m-0 py-3"> created  2020 / <span id="currentYear">  </span> created by <a href="https://twitter.com/AyoubOubani" target="_blank">Ayoub Oubani</a>
</div>
<!-- Copyright -->
<script>
    const CurrentYear = new Date().getFullYear();
    document.getElementById('currentYear').innerHTML=CurrentYear;
</script>