<?php

/**
 * テキストコンテンツを安全に出力するヘルパー関数。
 * <br> <strong> <em> のみ HTML タグとして許可し、それ以外は除去します。
 */
function safe_html(string $str): string
{
    return strip_tags($str, '<br><strong><em>');
}

$profile = [
    'name'                 => '堀田 善寛',
    'nameKana'             => 'ほったよしひろ',
    'nameEn'               => 'Hotta Yoshihiro',
    'birthDate'            => '1991年2月6日生まれ',
    'photo'                => '/assets/images/photo.png',
    'roleLabel'            => 'Web Engineer',
    'title'                => 'フロントからインフラまで担う<br>エンジニア',
    'description'          => '提案から実装、運用までプロジェクトに伴走します。',
    'specialty'            => 'フロントエンドを中心にバックエンドやインフラも担当',
    'strongTechnologies'   => ['HTML', 'CSS', 'JavaScript', 'PHP', 'WordPress'],
    'experiencedTechnologies' => ['TypeScript', 'React.js', 'Next.js', 'MySQL', 'Go', 'Gin', 'Ruby', 'Ruby on Rails', 'GraphQL', 'AWS', 'Docker', 'GitHub Actions', 'Terraform'],
    'interest'             => 'AIを使ったシステムの実装・運用の自動化',
    'email'                => 'hotta@zenweb.info',
    'github'               => 'https://github.com/yhotta345',
    'blog'                 => 'https://zenweb.info/',
    'wantedly'             => 'https://www.wantedly.com/id/yoshihiro_hotta',
];

$summaryCards = [
    [
        'title' => 'プロフィール',
        'href'  => '/profile/',
        'body'  => '北海道函館市在住。制作会社・自社開発を経て現在は社内エンジニアとして勤務。経歴・ビジョン・大切にしていることをまとめています。',
    ],
    [
        'title' => 'スキル',
        'href'  => '/skills/',
        'body'  => 'HTML・CSS・JavaScript・PHP・WordPress を軸に、Go・Ruby・AWS・Docker など。得意技術と経験領域をカテゴリ別に整理しています。',
    ],
    [
        'title' => '制作物',
        'href'  => '/works/',
        'body'  => '個人開発・業務で手がけた制作物を、使用技術・背景・工夫した点とともに掲載しています。',
    ],
];

$skillCategories = [
    [
        'title'       => 'Frontend',
        'titleJa'     => 'フロントエンド',
        'description' => 'WebサイトやWebアプリケーションのUI実装に対応できます。<br>デザインデータを元にした画面構築から、動的なインタラクションの実装まで行います。<br>React / Next.js を用いたコンポーネントベースの開発にも対応しています。',
        'items'       => ['HTML', 'CSS', 'JavaScript', 'TypeScript', 'jQuery', 'Bootstrap', 'Tailwind CSS', 'React.js', 'Next.js'],
    ],
    [
        'title'       => 'Backend',
        'titleJa'     => 'バックエンド',
        'description' => 'CMSの拡張やWebアプリケーションのサーバーサイド実装を行えます。<br>データベース設計やAPIの実装、既存システムの機能追加・保守にも対応しています。',
        'items'       => ['PHP', 'WordPress', 'MySQL', 'Go', 'Gin', 'Ruby', 'Ruby on Rails'],
    ],
    [
        'title'       => 'Infrastructure',
        'titleJa'     => 'インフラ',
        'description' => 'アプリケーションの実行環境や開発環境の構築を行えます。<br>コンテナ環境の整備やCI/CDの構築など、開発から運用までを見据えた環境構成に対応しています。',
        'items'       => ['AWS', 'Docker', 'GitHub Actions', 'Terraform', 'GraphQL'],
    ],
];

$allSkills = array_merge($skillCategories, [
    [
        'title'       => 'Specialties',
        'description' => '現時点で特に強みとして出したい技術領域です。',
        'items'       => $profile['strongTechnologies'],
    ],
    [
        'title'       => 'Interest',
        'description' => '今後さらに深めていきたい技術的なテーマです。',
        'items'       => ['AI活用', '実装自動化', '運用自動化'],
    ],
]);

$skillYears = [
    ['name' => 'HTML', 'years' => '10年', 'icon' => '/assets/icons/skills/html5.svg'],
    ['name' => 'CSS', 'years' => '10年', 'icon' => '/assets/icons/skills/css3.svg'],
    ['name' => 'SCSS (Sass)', 'years' => '6年', 'icon' => '/assets/icons/skills/sass.svg'],
    ['name' => 'Bootstrap', 'years' => '2年', 'icon' => '/assets/icons/skills/bootstrap.svg'],
    ['name' => 'Tailwind CSS', 'years' => '1年', 'icon' => '/assets/icons/skills/tailwindcss.svg'],
    ['name' => 'jQuery', 'years' => '8年', 'icon' => '/assets/icons/skills/jquery.svg'],
    ['name' => 'JavaScript', 'years' => '6年', 'icon' => '/assets/icons/skills/js.svg'],
    ['name' => 'TypeScript', 'years' => '1年', 'icon' => '/assets/icons/skills/typescript.svg'],
    ['name' => 'React.js', 'years' => '1年', 'icon' => '/assets/icons/skills/react.svg'],
    ['name' => 'Next.js', 'years' => '1年', 'icon' => '/assets/icons/skills/nextjs.svg'],
    ['name' => 'PHP', 'years' => '4年', 'icon' => '/assets/icons/skills/php.svg'],
    ['name' => 'WordPress', 'years' => '8年', 'icon' => '/assets/icons/skills/wordpress.svg'],
    ['name' => 'MySQL', 'years' => '1年', 'icon' => '/assets/icons/skills/mysql.svg'],
    ['name' => 'MariaDB', 'years' => '1年', 'icon' => '/assets/icons/skills/mariadb.svg'],
    ['name' => 'PostgreSQL', 'years' => '1年', 'icon' => '/assets/icons/skills/postgresql.svg'],
    ['name' => 'Go', 'years' => '1年', 'icon' => '/assets/icons/skills/go.svg'],
    ['name' => 'Gin', 'years' => '1年', 'icon' => '/assets/icons/skills/gin.svg'],
    ['name' => 'Ruby', 'years' => '1年', 'icon' => '/assets/icons/skills/ruby.svg'],
    ['name' => 'Ruby on Rails', 'years' => '1年', 'icon' => '/assets/icons/skills/rails.svg'],
    ['name' => 'GraphQL', 'years' => '1年', 'icon' => '/assets/icons/skills/graphql.svg'],
    ['name' => 'AWS', 'years' => '1年', 'icon' => '/assets/icons/skills/aws.svg'],
    ['name' => 'Docker', 'years' => '1年', 'icon' => '/assets/icons/skills/docker.svg'],
    ['name' => 'GitHub Actions', 'years' => '1年', 'icon' => '/assets/icons/skills/github-actions.svg'],
    ['name' => 'Terraform', 'years' => '1年', 'icon' => '/assets/icons/skills/terraform.svg'],
    ['name' => 'Datadog', 'years' => '1年', 'icon' => '/assets/icons/skills/datadog.svg'],
    ['name' => 'Sentry', 'years' => '1年', 'icon' => '/assets/icons/skills/sentry.svg'],
    ['name' => 'Figma', 'years' => '2年', 'icon' => '/assets/icons/skills/figma.svg'],
    ['name' => 'Photoshop', 'years' => '10年', 'icon' => '/assets/icons/skills/photoshop.svg'],
    ['name' => 'Illustrator', 'years' => '10年', 'icon' => '/assets/icons/skills/illustrator.svg'],
    ['name' => 'XD', 'years' => '8年', 'icon' => '/assets/icons/skills/xd.svg'],
];

$skillHighlights = [
    [
        'titleEn' => 'Expertise',
        'titleJa' => '技術領域と実務経験',
        'body'    => '実装から保守・運用まで継続的に携わってきた技術領域です。<br>機能実装だけでなく、更新しやすさや運用のしやすさも意識した構成で開発に取り組んでいます。',
        'items'   => [
            ['label' => 'フロントエンド',    'details' => 'HTML / CSS / JavaScript を用いたWebサイトのUI実装に対応しています。React / Next.js を用いたコンポーネントベースの開発や、既存サイトの改修・保守も行っています。'],
            ['label' => 'CMS・Webサイト開発',          'details' => 'WordPressを用いたサイト構築や機能拡張に対応しています。カスタムテーマやプラグインの実装、運用を見据えた更新しやすい構成での開発を行っています。'],
            ['label' => 'バックエンド',      'details' => 'Go や Ruby 系のアプリケーションの改修・保守に携わってきました。既存APIの拡張やデータ処理の実装など、バックエンド機能の改善にも対応しています。'],
            ['label' => 'インフラ / DevOps', 'details' => 'AWS を中心とした環境でのアプリケーション運用に関わっています。Docker や CI/CD を用いた開発・運用環境の整備や、Infrastructure as Code を用いた環境管理を経験しています。'],
        ],
    ],
    [
        'titleEn' => 'Process & Role',
        'titleJa' => '開発での担当領域',
        'body'    => '要件整理から実装、保守・運用まで、開発の各フェーズに継続して関わってきました。',
        'items'   => [
            ['label' => 'ポジション',       'details' => 'メンバーとしての実装担当から、案件によってはリーダー補佐として要件整理や進行管理にも関わってきました。プロジェクト規模は小規模開発から複数名のチーム開発まで経験しています。'],
            ['label' => '要件定義・設計',   'details' => 'クライアントや関係者とのヒアリングをもとに、機能要件の整理や仕様の言語化を担当。実装タスクへの落とし込みや、開発チームへの共有を行ってきました。'],
            ['label' => '実装・テスト',     'details' => 'フロントエンドからバックエンドまでの機能実装を担当。単体・結合テスト、ブラウザ動作確認、バグ修正までを一貫して対応しています。'],
            ['label' => '保守・運用',       'details' => '既存システムの機能改修、不具合対応、依存ライブラリの更新など、運用フェーズの改善作業にも継続的に関わっています。'],
        ],
    ],
    [
        'titleEn' => 'Dev Style',
        'titleJa' => '開発スタイル',
        'body'    => '開発を進めるうえで意識しているコミュニケーションやツール活用のスタイルです。',
        'items'   => [
            ['label' => 'コミュニケーション', 'details' => 'フルリモート環境での開発業務に携わっており、チャットベースのコミュニケーションやビデオ通話を用いた打ち合わせに慣れています。仕様や課題はテキストで整理し、認識のズレが起きない形で共有することを意識しています。'],
            ['label' => 'AI 活用',            'details' => '実装や調査の補助として AI ツール（Codex / Claude Code など）を活用しています。生成コードをそのまま採用するのではなく、内容の検証や設計との整合性を確認しながら利用しています。'],
        ],
    ],
];

$works = [
    [
        'title'     => 'ポートフォリオサイト',
        'category'  => 'Webサイト',
        'summary'   => '自身の経歴・スキル・制作物を伝えるために自作したポートフォリオサイトです。PHP を素組みで構成し、お問い合わせフォームや Cloudflare Turnstile によるスパム対策まで含めて実装しています。',
        'stack'     => ['PHP', 'JavaScript', 'Bootstrap 5', 'CSS'],
        'github'    => 'https://github.com/yhotta345/portfolio',
        'demo'      => '',
        'image'     => '/assets/images/works/portfolio.png',
        'highlight' => '',
        'status'    => 'personal',
        'details'   => [
            ['label' => '概要', 'value' => '自身の経歴・スキル・制作物を伝えることを目的に構築した個人ポートフォリオサイト。フレームワークを使用せず PHP で構成し、テンプレート分割・データ管理・フォームバリデーション・メール送信までを自前で実装した。'],
            ['label' => 'URL', 'value' => 'https://portfolio.zenweb.info/'],
            ['label' => 'GitHub', 'value' => 'https://github.com/yhotta345/portfolio'],
            ['label' => '技術スタック詳細', 'value' => 'PHP / JavaScript / Bootstrap 5 / CSS / Cloudflare Turnstile / PHPMailer'],
            ['label' => '担当内容', 'value' => 'MVCに近い構造を意識したディレクトリ設計を行い、includes と assets を分離してテンプレートとロジックの責務を整理。CSS はカスタムプロパティによるデザイントークンで管理し、Bootstrap と組み合わせてデザインの一貫性を維持した。お問い合わせフォームでは入力バリデーション・CSRF 対策・Cloudflare Turnstile によるスパム防止・PHPMailer によるメール送信・自動返信までを一貫して実装した。'],
            ['label' => '工夫した点', 'value' => 'フレームワークを使用しない構成でテンプレート管理と簡易ルーティングを自前で設計し、保守しやすいディレクトリ構成を構築。Cloudflare Turnstile のサーバーサイド検証フローについては公式ドキュメントをもとに処理フローを整理し、レスポンシブ対応時のレイアウトについても設計段階から考慮した構成とした。'],
            ['label' => '成果', 'value' => '経歴・スキル・制作物・お問い合わせを一元管理できる情報発信基盤を構築。フレームワーク不使用の構成を通じて、PHP によるテンプレート分割・フォーム処理・外部 API との連携の実装知識を体系的に整理した。'],
        ],
    ],
];

$projects = [
    [
        'title'    => '食品メーカー コーポレートサイト / コンテンツメディア構築',
        'category' => 'CMS構築',
        'stack'    => ['WordPress', 'PHP', 'JavaScript', 'HTML', 'CSS'],
        'image'    => '',
        'details'  => [
            ['label' => '概要',           'value' => '食品メーカーのコンテンツ発信基盤として、コーポレートサイト兼オウンドメディアを新規構築。ECサイトや外部ブログに分散していたレシピ記事・企業ストーリー・商品情報などを統合し、ブランドの世界観を伝える情報発信サイトとしてWordPressで構築した。'],
            ['label' => '担当期間',       'value' => '約3ヶ月'],
            ['label' => '役割',           'value' => 'PM / 画面設計 / フロントエンド実装 / WordPress実装（小規模チーム）'],
            ['label' => '技術スタック詳細', 'value' => 'WordPress / PHP / JavaScript / HTML / CSS'],
            ['label' => '担当内容',       'value' => '企画提案、サイト構成設計、ワイヤーフレーム作成、UIデザイン一部制作、フロントエンドコーディング、WordPressテーマ実装を担当。レシピ記事やコラムなどのコンテンツ管理を想定し、更新しやすい投稿設計とテンプレート構築を行った。'],
            ['label' => '工夫した点',     'value' => 'ECサイト・ブログ・SNSなど複数の場所に分散していたコンテンツを整理し、ブランドの魅力が伝わる導線設計を重視。特にレシピ記事や商品ストーリーなどのコンテンツを軸にした画面構成を設計し、閲覧者が自然に企業の価値観や商品背景を理解できる構成にした。また、更新頻度の高い記事コンテンツについては運用担当者が更新しやすいようWordPressの投稿構造とテンプレートを設計した。'],
            ['label' => '成果',           'value' => '企業の魅力を伝えるコンテンツ発信拠点を構築し、ブランドの世界観を統一的に表現できるサイト基盤を整備。分散していた情報を集約することで、企業ストーリー・商品・レシピなどのコンテンツを横断的に閲覧できる構造を実現した。'],
        ],
    ],
    [
        'title'    => '大規模メディアサイト WordPressテーマ刷新 / インフラ移行',
        'category' => 'CMS構築',
        'stack'    => ['WordPress', 'PHP', 'JavaScript', 'AWS', 'Linux'],
        'image'    => '',
        'details'  => [
            [
                'label' => '概要',
                'value' => '月間100万PV規模のWordPressメディアサイトにおいて、長年の運用で複雑化していた既存テーマを刷新。運用負荷の軽減とパフォーマンス改善を目的に、有名WordPressテーマへの移行を実施するとともに、インフラをAWSからレンタルサーバーへ移行した。'
            ],
            [
                'label' => '担当期間',
                'value' => '約6ヶ月'
            ],
            [
                'label' => '役割',
                'value' => 'PM / WordPress実装 / インフラ移行 / 一部UIデザイン（複数部署関係者と連携）'
            ],
            [
                'label' => '技術スタック詳細',
                'value' => 'WordPress / PHP / JavaScript / AWS / Linux / DNS'
            ],
            [
                'label' => '担当内容',
                'value' => '既存テーマから新テーマへの移行設計、WordPress実装、データ移行、AWSからレンタルサーバーへのインフラ移行、UI調整、運用改善設計を担当。マーケティング部門のメンバーが更新しやすい管理画面設計を行い、サイトの運用負荷軽減を目的としたCMS構造の再設計を実施した。'
            ],
            [
                'label' => '工夫した点',
                'value' => 'サイト運用に関わるマーケティングメンバーへヒアリングを実施し、実際の運用フローを整理したうえで管理画面から更新可能な範囲を拡張。従来はPHPテンプレート中心だったページ構成を見直し、テーマの標準レイアウトをベースにCSS調整で対応することで保守性を向上させた。また、クラシックエディター中心の運用からブロックエディターへの移行を行い、非エンジニアでも記事更新やページ修正がしやすい構成に改善した。'
            ],
            [
                'label' => 'インフラ移行の工夫',
                'value' => 'AWSからレンタルサーバーへの移行にあたり、事前にテスト移行を実施して移行手順を整備し、冪等性のある移行プロセスを構築。本番移行時のリスクを最小化した。また、想定アクセスを考慮した負荷テストを行い、適切なレンタルサーバープランを選定した。'
            ],
            [
                'label' => '可用性対策',
                'value' => 'AWSから移行することで可用性が低下するリスクを考慮し、緊急用のバックアップサーバーを別レンタルサーバーとして構築。メインサーバー障害時にはDNS切り替えのみでサービス継続できる構成を設計した。'
            ],
            [
                'label' => '成果',
                'value' => 'サイト運用の属人化を解消し、マーケティング部門が管理画面から更新できる範囲を大幅に拡張。インフラコストについてもAWS運用時と比較して半分以上削減し、安定したメディア運用基盤を構築した。'
            ],
        ],
    ],
    [
        'title'    => '団体紹介サイト WordPress構築',
        'category' => 'CMS構築',
        'stack'    => ['WordPress', 'PHP', 'JavaScript', 'HTML', 'CSS'],
        'image'    => '',
        'details'  => [
            [
                'label' => '概要',
                'value' => '特定の疾患を持つ方々が集まり交流活動を行う団体の紹介サイトを新規構築。交流会・講演会・研修会などの活動内容を紹介し、会の概要や活動の雰囲気が初めて訪れた人にも分かりやすく伝わる構成でWordPressサイトを制作した。'
            ],
            [
                'label' => '担当期間',
                'value' => '約1ヶ月'
            ],
            [
                'label' => '役割',
                'value' => 'PM / 要件整理 / 画面設計 / デザイン / フロントエンド実装 / WordPress実装 / デプロイ（営業以外の全工程を担当）'
            ],
            [
                'label' => '技術スタック詳細',
                'value' => 'WordPress / PHP / JavaScript / HTML / CSS'
            ],
            [
                'label' => '担当内容',
                'value' => 'クライアントヒアリングをもとにサイト構成を設計し、ワイヤーフレーム作成、UIデザイン、コーディング、WordPressテーマ実装、サーバーへのデプロイまでを一貫して担当。活動報告などの更新を想定し、投稿機能を用いたコンテンツ更新ができる構造を構築した。'
            ],
            [
                'label' => '工夫した点',
                'value' => '限られた制作予算の中でサイトの目的を達成するため、基本構成はトップページ中心のシンプルな設計とし、団体の概要・活動内容・イベント情報が一画面で把握できる情報設計を行った。また、将来的な運用を考慮し、WordPressの投稿機能を用いて活動報告やお知らせを管理画面から更新できる構造とした。'
            ],
            [
                'label' => '成果',
                'value' => 'シンプルな構成ながら団体の活動内容が分かりやすく伝わるサイトを構築し、継続的に更新・運用できるWordPress基盤を整備した。'
            ],
        ],
    ],
    [
        'title'    => '水産食品企業 コーポレート / 店舗 / ECサイト リニューアル',
        'category' => 'Webサイト',
        'stack'    => ['WordPress', 'PHP', 'JavaScript', 'ショップサーブ'],
        'image'    => '',
        'details'  => [
            [
                'label' => '概要',
                'value' => '高級水産食材を扱う企業が運営するコーポレートサイト、飲食店舗サイト、ECサイトのリニューアルプロジェクトを担当。既存サイトの運用保守を引き継ぎつつ、新規店舗サイトのWordPress構築およびECサイトのデザインリニューアルを実施した。'
            ],
            [
                'label' => '担当期間',
                'value' => '約1年'
            ],
            [
                'label' => '役割',
                'value' => 'PM / 実装担当（複数サイト横断プロジェクト）'
            ],
            [
                'label' => '技術スタック詳細',
                'value' => 'WordPress / PHP / JavaScript / ショップサーブ / Ajax'
            ],
            [
                'label' => '担当内容',
                'value' => '既存コーポレートサイトおよび飲食店サイト（複数店舗）の運用保守を引き継ぎ、デザインリニューアルおよび機能改善を担当。加えて、新規オープン店舗のWordPressサイト構築、ECサイト（ショップサーブ）のデザインフルリニューアルを実施した。'
            ],
            [
                'label' => '工夫した点',
                'value' => '扱う食材の特性上、海況や天候により入荷状況が変動するため、WordPress管理画面に入荷状況を入力する管理機能を実装。入力された情報をAPIとして公開し、Ajaxで各サイトから取得する仕組みを構築したことで、複数サイト間でリアルタイムに近い入荷情報を共有できるようにした。'
            ],
            [
                'label' => '成果',
                'value' => 'コーポレートサイト、店舗サイト、ECサイトのデザインを統一し、ブランドイメージを整理。加えて、商品の入荷状況を各サイトから確認できる仕組みを構築したことで、ユーザーへ鮮度の高い情報提供が可能となった。'
            ],
        ],
    ]
];

$profileIntro = '北海道函館市でエンジニアとして活動している堀田善寛です。<br>現在は東京都のIT教育を行う企業で社内エンジニアとして働きながら、地元企業の IT 周りのサポートにも携わっています。';

$profileVision = [
    'WordPressを中心としたWebサイトやシステムの開発・運用に取り組んでいます。',
    'フロントエンドを軸にしながら、バックエンドやインフラにも領域を広げ、サービス全体を見渡せる実装者であることを意識しています。<br>実装だけで終わらせるのではなく、その後の運用や改善まで見据え、長く扱いやすい構成を考えながら開発に取り組んでいます。',
];

$careerHistory = [
    [
        'year' => '2017',
        'body' => 'ハコレコドットコム株式会社にて、Web 制作・運用・保守を担当。',
    ],
    [
        'year' => '2021',
        'body' => '株式会社SAMURAIにて、自社メディアサイトの制作・運用・保守・リニューアル、サービス予約システムの制作・運用・保守・リニューアル、そのほか社内システムの運用・保守を担当。',
    ],
];
