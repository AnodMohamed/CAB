<main id="main" class="main-site">

  <div class="container">
     <div class="wrap-breadcrumb">
          <ul>
              <li class="item-link"><a href="{{ route('home')}}" class="link">home</a></li>
              <li class="item-link"><a href="{{ route('admin.Experts') }}" class="link">Manage Experts </a></li>
              <li class="item-link"><span>Change Expert Status </span></li>

         </ul>
      </div>
  </div>
  <div class="container">
      <div class="panel-body">
          @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                  {{Session::get('message')}}
              </div>
          @endif
          <form class="form-horizontal" wire:submit.prevent="updateStatus">

                      <div class="mb-6 col-8">
                          <label class=" control-label">Featured </label>
                          <select class="form-control" wire:model="featured"> 
                                  <option value="0">Inactive</option>
                                  <option value="1">Active</option>
                                  <option value="2">Rejected</option>

                          </select>
                      </div>
                  <div class="row" style="margin: 10px auto;">
                      <button type="submit"  class="btn btn-primary"  style="display: flex;margin: auto;"> Submit</button>
                  </div>       
          </form>

      </div>
  </div>
</main>
