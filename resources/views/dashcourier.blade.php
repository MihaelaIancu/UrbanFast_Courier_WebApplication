@extends('layouts.appadmin')

<style>

.links > a {
                color: #3f2a1d !important;
                padding: 0 25px;
                font-size: 11px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Customer Console</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Details about services
                </div>
            </div> -->

            <ul class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class = "container navbar-nav links">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="nav-justified nav-item" >Courier Console </div>
                    <!-- <li><a class="active content" href="{{ url('/customer/{user}') }}" style="color: #636b6f !important;">AWB</a></li> -->
                    <!-- <li><a href="#borderou" style="color: #636b6f !important;" >Courier</a></li>
                    <li><a href="#cost" style="color: #636b6f !important;" >Manager</a></li>
                    <li class="right"><a href="#about" style="color: #636b6f !important;">Foreman</a></li>
                    <li><a href="#cost" style="color: #636b6f !important;" >Ramburs</a></li> -->
                </div>
            </ul>

             <div class="card">
                <!-- <div class="card-header">Admin Console</div> -->

                <div class="card-body">

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <li><a class="active content" href="{{ url('/customer/{user}') }}" style="color: #636b6f !important;">AWB</a></li> -->
                    <p style = "color: #3f2a1d !important;">Packages</p>
                    <!-- <li><a href="#cost" style="color: #636b6f !important;" >Manager</a></li>
                    <li class="right"><a href="#about" style="color: #636b6f !important;">Foreman</a></li>
                    <li><a href="#cost" style="color: #636b6f !important;" >Ramburs</a></li> -->

                    <div class="row p-5">
                        <div class="col-md-12">

                        <!-- <form  method="POST" action="update"> -->
                        {{ csrf_field()}}

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Package ID</th>
                                        <!-- <th class="border-0 text-uppercase small font-weight-bold">Item</th> -->
                                        <th class="border-0 text-uppercase small font-weight-bold">Status</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Change Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($parcel as $key => $data)
                                <tbody>
                                    <tr>
                                        <td>{{$data->pack_code}}</td>
                                        <td>{{$data->status}}</td>
                                        <td> 
                                       
                                <select 
                                    id="status-{{$data->pack_code}}" 
                                    style="font-size: 15px;" 
                                    name="status_cgs[{{$data->pack_code}}]"
                                    class="col-form-label text-md-right status_cgs" 
                                    required
                                >
                                    <option value="" selected>Select status</option>
                                    <option value="picked up">Picked Up</option>
                                    <option value="delivering">Delivering</option>
                                    <option value="successfully delivered">Successfully Delivered</option>
                                </select>
                                        </td>
                                        <td>
                                        <button 
                                            class="btn btn-dark" 
                                            onClick="changeStatus({{$data->pack_code}})" 
                                            type="button"
                                        >
                                            Update
                                        </button>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                        <!-- <input type="submit" class="btn btn-dark" name="update" value="Update"> -->
                        
                    <!-- </form> -->
                    <a class="pl-3 pt-3 active content" href="{{ url('/courier/dashcourier') }}" style="color: #636b6f !important;">See your updates</a>

                    </div>

                    
                      
                    
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function changeStatus(id) {
        console.log();
        $.ajax({
            method: "POST",
            async: true,
            cache: false,
            url: '/courier/update-status',
            data: {
                id: id,
                value: $("#status-" + id).val()
            },
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        }).done((data) => {
            console.log(data);
        }).fail(() => {
            console.log("fail");
        })
}
window.addEventListener("load", () => {
    
});
</script>

@endsection
