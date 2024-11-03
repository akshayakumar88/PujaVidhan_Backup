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
    .PDFYajmaanContainer {
        margin-top: 20px;
        display: flex;
        flex-wrap:wrap;
    }
    .PDFYajmaanContainer .eachItem {
        padding: 16px 15px 16px;
        width: calc(50% - 32px);
        font-size:90%;
        margin-bottom:13px;
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
            </div>
            <div class="mt-3 PDFYajmaanContainer row mx-0">
                @foreach($list as $index => $yajmaan)
                    <div class="col-sm-6 eachItem">
                        <div>Name: {{$yajmaan->yajmaan_name}}</div>
                        <div>{{$yajmaan->relation}}: {{$yajmaan->relname}}</div>
                        <div>Tithi: {{$yajmaan->toexp}}</div>
                        <div>Pakshya: {{$yajmaan->poexp}}</div>
                        <div>Masa: {{$yajmaan->moexp}}</div>
                        <div>Street: {{$yajmaan->yajmaan_street}}</div>
                        <div>Location: {{$yajmaan->yajmaan_location}}</div>
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