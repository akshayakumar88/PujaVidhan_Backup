<meta charset="utf-8">
  <title>Puja Vidhan</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="https://d.pujavidhan.in/favicon.ico">
  
<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<style type="text/css">
body {
    /*background: #fddbac url('https://d.pujavidhan.in/kalas-stambh.bcc1edd86bf4631f.webp') no-repeat center center;*/
    background: #fddbac;
    background-attachment: fixed;
    background-size: auto 70%;
    font-size:1.5em;
}
.container {
    max-width:900px;
    margin: 0px auto;
}

.table>:not(caption)>*>* {
    background: transparent !important;
}
.PVLink {
    color:inherit;
    text-decoration:none;
    transition:all 0.5s ease;
}
.PVLink:hover {
    background: #ffd49b;
}
.eachItem {
    /*border:1px dashed #ffc170;*/
    border:1px dashed #747474;
}
/* normal view css */

@media all and (max-width: 767px) {
    .PVLink img {
        width: 40px;
    }
    .PVLink h2{
        font-size:22px;
        margin-left:10px !important;
    }
}

@media print {
    .PVLogo {
        border-bottom: 1px solid #6c757d;
    }
    .PVLink {
        display:inline-flex;
        align-items:center;
    }
    .PVLink img {
        width: 50px;
    }
    .PVLink h2{
        font-size:20px;
        margin-left:15px;
    }
    .eachItem {
        padding: 0px 15px;
        display:inline-flex;
        justify-content:space-between;
        width: calc(49% - 30px);
        font-size:90%;
    }
    .eachItem div:nth-of-type(2) {
        text-align:right;
    }
    .itmsubcatblock {
        clear:both;
        margin-top:20px;
        text-align:center;
    }
    #printBtn {
        display: none;
    }

    /* Sets print area element and all its content to display */
}
</style>

<div class="container py-3 h-100">
    <div class="row h-100">
        <div class="mb-3" id="listData">
            <div class="PVLogo border-bottom border-secondary d-flex justify-content-between align-items-center">
                <a href="https://d.pujavidhan.in" target="_new" class="PVLink d-inline-flex align-items-center p-1">
                    <img src="https://d.pujavidhan.in/assets/images/satyasanatan.webp" width="70" title="Puja Vidhan" />
                    <h2 class="ms-3 fw-bold">Puja Vidhan</h2>
                    
                </a>
                @if($list[0]->cat_name != '')
                    <h3 class="itmcatnameblock fw-bold">{{$list[0]->cat_name}}</h3>
                @endif
            </div>
            <div class="row mx-0">
                @foreach($list as $index => $item)
                    @if($item->isItmSubCat == 1)
                        <div class="col-12 mt-4 itmsubcatblock">
                            <div class="fw-bold text-center"><strong>{{$item->item_sub_cat}}</strong></div>
                        </div>
                    @endif
                    <div class="col-12 col-md-6 eachItem d-flex">
                        <div class="col p-0">{{$item->item_name}}</div>
                        <div class="text-end">{{$item->quantity}} {{$item->unit}}</div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3 mb-5 text-center">
                <button type="button" class="btn btn-primary" id="printBtn">Print</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
document.getElementById('printBtn').addEventListener('click', () => {
    window.print()
});
// Prints area to which class was assigned only
</script>