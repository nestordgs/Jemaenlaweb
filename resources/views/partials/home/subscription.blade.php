{{-- Created by Nestor on 6/27/2017. --}}
<div class="bg-dark-gray">
    <div class="container pad-top-15">
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-12 col-sm-6">
                <h4 class="text-center">¿Quieres 6 de mis mejores recursos de marketing online?</h4>
                <p class="text-gray">
                    Suscríbete a mi newsletter y obtén contenido exclusivo que te ayudará a potenciar tus ventas en el mundo digital. #AprendoConJeMa
                </p>
                <form action="#">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" class="form-control input-sm">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control input-sm">
                    </div>
                    <p class="text-right">
                        <button class="btn btn-sm btn-purple" type="button">
                            ¡Lo Quiero!
                        </button>
                    </p>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6">
                <iframe width="100%" class="iframe-video" src="{{ App\getVideoUrl(get_theme_mod('type_video'),get_theme_mod('link_video_subscripcion')) }}" style="border: none;"></iframe>
            </div>
        </div>
    </div>
</div>