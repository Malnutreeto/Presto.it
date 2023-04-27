@vite('resources/css/footer.css')

<div class="footer footer-link container-fluid">
    <div class="row justify-content-center">
        <div class="col-4 left d-flex align-items-center flex-column">
            <div class="text-start">
            <img src="{{asset('site_img/solobusta.png')}}" alt="" class="logu">
            <h3>PRESTO.IT</h3>
            <h6>via Di Quì, 45</h6>
            <h6>Domodossola, VB, Italy</h6>
            <br/>
            <h6>+39 0808724587</h6>
            <br/>
            <h6>P.IVA 456781245</h6>
            <h6>PEC: prestissimo@pec.it</h6>
            <h6>Cap.Soc. 6€</h6>
            </div>
        </div>
        <div class ="col-4 right d-flex justify-content-center flex-column">
            <h3>SEZIONI:</h3>
            <a href="{{route('product.create')}}" class="footer-link"><h5>Inserisci annuncio</h5></a>
            <a href="{{route('category.index')}}" class="footer-link"><h5>Categorie</h5></a>
            <a href="{{route('product.index')}}" class="footer-link"><h5>Prodotti</h5></a> 
        </div>
    </div>
</div>