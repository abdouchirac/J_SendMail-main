

<div>
    <li class="nav-item">
      <a href="" class="nav-link d-flex align-items-center">
        <span class="sidebar-icon me-3">
        </span>
        <span class="mt-1 ms-1 sidebar-text">

         J-SENDMAIL
        </span>
      </a>
    </li>
    <title>le login</title>
    <div class="py-4">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-light shadow-sm components-section">
                <div class="card-body">
                    <div class="mb-3 mt-5">
                        <h1>HELLO!</h1>
                        <H4 class="h4">{{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->last_name : 'User Name'}}  a  validé son courrier avec succès</H4>
                        <p>nous vous remercions !</p>




                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <h4><a href="https://jsendmail.jainli.com/login" style="color: blue">Le lien Connexion</a></h4>

