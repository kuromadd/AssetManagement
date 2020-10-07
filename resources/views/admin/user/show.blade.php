@extends('app.layout')
@section('content')
<style>
    .float-container {
    padding: 5px;
}

.float-child {
    width: 50%;
    float: left;
    padding: 15px;
}  
</style>
    <div class="card card-default">
        <div class="card-header" style="background-color: #ecf4fd">  
            <div class="text-center">
                <div class="h1 mt-4">
                     User Information :
                </div>
                
            </div>
        </div>
            
        <div class="card-body">     
            <div class="text-center">
                <h2>
                    {{ $user->name }},  <span class="font-weight-light">{{\Carbon\Carbon::parse($user->profile->birthdate)->diff(\Carbon\Carbon::now())->format('%y')}}</span>
                </h2>
                <div class="my-4">
                    <img src="{{ asset($user->profile->image) }}" id="output" class="rounded-circle" width="100">
                </div>
                <hr class="my-4" width="75%"/>
                <div class="h3 font-weight-300">
                    <i class="ni location_pin mr-2"></i>{{ $user->profile->birthplace }}
                </div>
                <div class="h3 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>{{ $user->profile->job }}
                </div>
                <div>
                    <i class="ni education_hat mr-2"></i>{{ $user->profile->university }}
                </div>
                <hr class="my-4" width="75%"/>
                <p>{{ $user->profile->about }}</p>
            </div>
        </div>
    </div><tr></tr>
    <div id="div_print" >
    <div style="display: flex; justify-content: center; text-align: center;" id="qrcode"></div>
    </div>        
    <input  name="b_print" type="button" class="ipt" onClick="printdiv('div_print');" value=" Print ">

    <script language="javascript">
        function printdiv(printpage)
        {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
        }
        </script>
    
    <script type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.js"></script>
    <script>
    
        var userInput = <?php echo json_encode($user->qrcode);?>
    
        var qrcode = new QRCode("qrcode", {
            text: userInput,
            width: 200,
            height: 200,
            colorDark: "black",//#5e72e4
            colorLight: "white",
            correctLevel: QRCode.CorrectLevel.H
        });
        
       
    </script>    
@endsection    


 