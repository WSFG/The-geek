@extends('layouts.app')

@section('content')
<main class="full-page place-page">
    <section class="content">
        <!--TODO: Страница события-->
        <div style="background-image: url('img/dsc-8066.jpg');" class="place-header">
            <div class="place-info">
                <h2 class="place-name">{{ $place->name }}</h2>
                <div class="place-address-phone-container">
                    <span class="place-address">{{ $place->address }}</span>
                    <span class="place-phone">Place phone</span>
                </div>
                <div class="place-time-container">
                    <span class="place-time">
                        <span>Время работы</span>
                        <span>{{ $place->working_time }}</span>
                    </span>
                </div>
            </div>
            <div class="place-photos">
                <div class="place-photo-container active">
                    <img class="place-photo" src="img/dsc-8066.jpg" alt="">
                    <div class="place-photo-shadow"></div>
                </div>
                <div class="place-photo-container">
                    <img class="place-photo" src="img/I-HouseCafe.jpg" alt="">
                    <div class="place-photo-shadow"></div>
                </div>
                <div class="place-photo-container">
                    <img class="place-photo" src="img/v-cafe-14.jpg" alt="">
                    <div class="place-photo-shadow"></div>
                </div>
                <div class="place-photo-container">
                    <img class="place-photo" src="img/dsc-8066.jpg" alt="">
                    <div class="place-photo-shadow"></div>
                </div>
                <div class="place-photo-container">
                    <img class="place-photo" src="img/I-HouseCafe.jpg" alt="">
                    <div class="place-photo-shadow"></div>
                </div>
            </div>
        </div>
        <div class="place-description">
            <h4>{{ __('Description') }}</h4>
            {{ $place->text }}
        </div>
        <div class="place-map">
            <img src="img/map.jpg" alt="">
        </div>
        <section class="place-events">
            <article class="place-event">
                <h3 class="place-event-name">Event name</h3>
                <img class="place-event-image" src="img/I-HouseCafe.jpg" alt="">
                <p class="place-event-description">Description Description Description Description</p>
                <a class="more" href="#">More</a>
            </article>
            <article class="place-event">
                <h3 class="place-event-name">Event name</h3>
                <img class="place-event-image" src="img/v-cafe-14.jpg" alt="">
                <p class="place-event-description">Description Description Description Description</p>
                <a class="more" href="#">More</a>
            </article>
            <article class="place-event">
                <h3 class="place-event-name">Event name</h3>
                <img class="place-event-image" src="img/dsc-8066.jpg" alt="">
                <p class="place-event-description">Description Description Description Description</p>
                <a class="more" href="#">More</a>
            </article>
        </section>
        <div class="info">
            <div class="article-rating">
                <!--TODO: Рейтинг звездами-->
            </div>
            <div class="comments">
                <div class="comment">
                    <a href=""><img class="header-user-photo" src="img/default-user-image.png" alt=""></a>
                    <div class="comment-user-info">
                        <h5><a href="">Name Surname</a></h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque blanditiis dignissimos quo
                            reiciendis voluptatem? Aliquam asperiores blanditiis delectus enim itaque minima modi
                            nesciunt, nulla, porro quam quasi reiciendis sed totam.
                            Adipisci aliquid amet assumenda at autem dicta dolore excepturi</p>
                    </div>
                </div>
                <div class="comment">
                    <a href=""><img class="header-user-photo" src="img/default-user-image.png" alt=""></a>
                    <div class="comment-user-info">
                        <h5><a href="">Name Surname</a></h5>
                        <p>Text</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection