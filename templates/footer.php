<footer class="page-footer font-small purple py-4 text-light">
    <!-- Footer Elements -->
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3 class="font-weight-bold mb-0">MDB</h3>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled d-flex justify-content-center mb-0 mt-2 text-uppercase">
              <li>
                <a class="mx-3" role="button">About</a>
              </li>
              <li>
                <a class="mx-3" role="button">Blog</a>
              </li>
              <li>
                <a class="mx-3" role="button">Policy</a>
              </li>
              <li>
                <a class="mx-3" role="button">Contact</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4 text-light">
            <ul class="list-unstyled d-flex justify-content-end mb-0 mt-2">
              <li>
                <a class="mx-3" role="button"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a class="mx-3" role="button"><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a class="mx-3" role="button"><i class="fab fa-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <script>
      window.onscroll = function() {myFunction()};
      
      var header = document.getElementById("myHeader");
      var sticky = header.offsetTop;
      
      function myFunction() {
        if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      }
      </script>
    <script src="https://kit.fontawesome.com/42c6529a12.js" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>