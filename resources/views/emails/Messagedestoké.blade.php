

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
                         <h4 class="h4">  {{$state['user_id']}}</h4>
                         <h4>vous avez bien retiré votre courrier avec succes! </h4>
                         <h4 class="h4"><strong> libele du courrier</strong>: {{$state['courrier_libele']}}</h4>
                         <h4 class="h4"><strong> date de reception</strong>: {{$state['courrier_date_arrive']}}</h4>
                         <div class="mb-3"><a href="https://jsendmail.jainli.com/login">cliquez ici pour verifier le statut de votre courrier.</a>
                         </div>
                        <p>nous vous remercions !</p>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
