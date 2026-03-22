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
            ['label' => '概要', 'value' => '経歴・スキル・制作物・お問い合わせをまとめた個人ポートフォリオサイトです。<br>フレームワークを使用せず PHP で構築し、テンプレート分割・データ管理・フォームバリデーション・メール送信までを自前で実装しています。'],
            ['label' => 'URL', 'value' => 'https://portfolio.zenweb.info/'],
            ['label' => 'GitHub', 'value' => 'https://github.com/yhotta345/portfolio'],
            ['label' => '技術スタック詳細', 'value' => 'PHP / JavaScript / Bootstrap 5 / CSS / Cloudflare Turnstile / PHPMailer'],
            ['label' => '設計・実装', 'value' => 'フレームワークを使用せず、MVCに近い構造を意識したディレクトリ設計を行いました。includes と assets を分離し、テンプレートとロジックの責務を整理しています。CSSはカスタムプロパティによるデザイントークンで管理し、Bootstrapと組み合わせてデザインの一貫性を維持しています。'],
            ['label' => '課題と対応', 'value' => 'フレームワークを使用しない構成でのテンプレート管理や簡易ルーティングの実装に苦労しました。また、Cloudflare Turnstile のサーバーサイド検証フローやレスポンシブ時のレイアウト調整にも対応しました。'],
            ['label' => '今後の改善', 'value' => '制作物の追加やコンテンツ拡充に加え、更新性を高めるためのCMS化も検討しています。'],
        ],
    ],
];

$projects = [
    // テンプレートはREADME参照
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
