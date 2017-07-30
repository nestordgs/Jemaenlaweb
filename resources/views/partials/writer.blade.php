{{-- Created by Nestor on 7/15/2017. --}}
@php
    $user_info = get_userdata( get_the_author_meta( 'ID' ) );
@endphp
<section class="pad-top-15">
    <div class="row">
        <div class="col-xs-4">
            <img src="{{ get_avatar_url( get_the_author_meta( 'ID' ) ) }}" alt="" class="img-responsive center-block">
        </div>
        <div class="col-xs-7">
            <h5><strong>{{ ucwords( strtolower( get_the_author() ) ) }}</strong></h5>
            <p>{{ $user_info->description }}</p>
            <p>Siguela en sus Redes Sociales:</p>
            <ul class="list-unstyled list-inline">
                @if(get_the_author_meta('twitter'))
                    <li>
                        <a href="https://twitter.com/{{ str_replace('@','',get_the_author_meta('twitter')) }}" target="_blank">
                            <span class="fa-stack fa-gradient fa-radius">
                                <i class="fa fa-twitter fa-stack-1x text-gray" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                @endif
                @if(get_the_author_meta('facebook'))
                    <li>
                        <a href="{{ get_the_author_meta('facebook') }}" target="_blank">
                            <span class="fa-stack fa-gradient fa-radius">
                                <i class="fa fa-facebook fa-stack-1x text-gray" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                @endif
                @if(get_the_author_meta('gplus'))
                    <li>
                        <a href="{{ get_the_author_meta('gplus') }}" target="_blank">
                            <span class="fa-stack fa-gradient fa-radius">
                                <i class="fa fa-google-plus fa-stack-1x text-gray" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                @endif
                @if(get_the_author_meta('linkedin'))
                    <li>
                        <a href="{{ get_the_author_meta('linkedin') }}" target="_blank">
                            <span class="fa-stack fa-gradient fa-radius">
                                <i class="fa fa-linkedin fa-stack-1x text-gray" aria-hidden="true"></i>
                            </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</section>