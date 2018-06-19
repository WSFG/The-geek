<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'title' => '«13 ПРИЧИН ПОЧЕМУ». СТОИТ ЛИ СМОТРЕТЬ 2 СЕЗОН?',
            'description' => '«13 причин почему». Стоит ли смотреть 2 сезон?',
            'text' => '
                    <h4>Ожидаемое продолжение истории</h4>
                    <h5>За:</h5>
                    <p>Первый сезон «13 причин почему» был насыщенным, честным и необычным.
                        Основываясь на романе Джея Эшера, Брайан Йорки смог воссоздать в формате сериала сложную драму о серьезной проблеме, с которой часто сталкиваются не только подростки, но и взрослые.
                        В общую картину было вплетено множество трудностей, возникающих на жизненном пути многих подростков.
                        Оригинальная драма пришлась многим по душе, так что продолжение отлично ляжет на усвоенный ранее материал.</p>
                    <h5>Против:</h5>
                    <p>С другой стороны, как и многие другие, сериал стал заложником определенных ожиданий со стороны зрителей.
                        Авторы явно сконцентрировались на той аудитории, которую успели набрать во время трансляции первого сезона, и постарались угодить именно ей, максимально уделяя внимание в продолжении конфликтам оригинала.
                        Более того, в контексте событий прошлого сезона новые подробности, всплывающие в ходе судебного процесса по делу Ханны, настолько шокируют, что едва ли не затирают те образы, которые успели сформироваться у зрителя.
                        Внезапно открываются нюансы, о которых до сих пор не было сказано ни слова, и они меняют общую картину порой радикально.</p>
                    <figure>
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_1-380x215.jpg">
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_2-380x215.jpg">
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_3-380x215.jpg">
                    </figure>
                    <h4>Злободневные темы</h4>
                    <h5>За:</h5>
                    <p>Если первый сезон больше ориентировался на повествование истории Ханны Бэйкер с ее точки зрения, то второй предлагает не только увидеть события с других ракурсов, но и расширяет круг проблем, поднятых год назад.
                        Здесь больше внимания уделяется сексуальным домогательствам, толерантности, однополым отношениям, школьной травле (буллингу) и т.п.
                        Затронута даже крайне злободневная для США стрельба в школах.</p>
                    <h5>Против:</h5>
                    <p>Правда, раскрыты темы весьма скудно.
                        Они появляются в кадре в виде небольших эпизодов или мелькают в фоне, но толком не получают развития.
                        Конечно, это способствует тому, чтобы не сильно утомлять зрителя всем и сразу, но донесение идеи страдает.
                        Да и некоторые начинания остаются не раскрытыми.
                        Признаться, помня о предыдущей откровенности сериала, некоторые моменты я смотрел с замиранием, но в итоге часто оказывался разочарован.</p>
                    <figure>
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_4-380x215.jpg">
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_5-380x215.jpg">
                        <img src="http://localhost/Geek/public/thumb/news/1/13_reasons_why_s2_6-380x215.jpg">
                    </figure>
                    <h4>Редкий и притягательный сеттинг</h4>
                    <h5>За:</h5>
                    <p>Хороших молодежных драм с логичными диалогами и насущными проблемами ох как мало.
                        После «Джуно» я и вспомнить не могу сходу ничего близкого, поставленного на достаточно высоком уровне.
                        Тот же «Ривердейл» хоть до последних серий второго сезона и радовал восхитительными кадрами, но куда чаще разочаровывал конвульсивными скачками сюжета.
                        У «13 причин почему» здесь огромное преимущество.
                        И несмотря на редкость, у этого жанра есть масса поклонников.
                        Как родившихся в 80-х и 90-х и ностальгирующих по старшей школе и фильмам той эпохи, так и тех, кому тема близка именно сейчас.
                        Взять как пример Life is Strange, собравшую весьма положительные отзывы.</p>
                    <h5>Против:</h5>
                    <p>Но здесь уже вступает в дело банальная вкусовщина.
                        При всей актуальности поднимаемых тем, конечное решение будет зависеть от того, насколько зрителя затянет.
                        И дело не в сеттинге и декорациях, и даже не в персонажах.
                        Ведь если подобные истории Вам не интересны, то нет и смысла пытаться насильно втянуться в происходящее.
                        В конце концов, «13 причин почему» не переворачивает мир и не дает гениального ответа на вопрос о том, как решить все эти проблемы, с которыми сталкиваются тинейджеры.</p>
                    <br>
                    <center><img src="http://localhost/Geek/public/thumb/news/1/13rw_203_04361r-1.jpg"></center>
            ',
            'image_id' => 2,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('comment_to_news')->insert([
            'news_id' => 1,
            'comment_id' => 1,
        ]);
        DB::table('comment_to_news')->insert([
            'news_id' => 1,
            'comment_id' => 2,
        ]);
        DB::table('news')->insert([
            'title' => 'Персонажи God of War. В игре и в мифологии',
            'description' => 'Рассказываем о главных персонажах God of War: кто они в игре и что представляют из себя в мифологии.',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image_id' => 3,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('news')->insert([
            'title' => 'Detroit: Become Human — первые оценки и цитаты из рецензий',
            'description' => '«Венец творения Quantic Dream»: Первые оценки Detroit: Become Human.',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image_id' => 4,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('news')->insert([
            'title' => 'DevGAMM Moscow 2018',
            'description' => 'Фотоотчет с конференции игровых разработчиков DevGAMM 2018.',
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'image_id' => 5,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
