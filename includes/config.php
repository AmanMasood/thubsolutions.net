<?php
/**
 * THub Solutions — site configuration.
 * Edit the values in this file to change contact details site-wide.
 */

define('SITE_NAME', 'THub Solutions');
define('SITE_URL', 'https://thubsolutions.net');
define('SITE_TAGLINE', 'Software, apps, cloud and AI for growing businesses');

// Contact details
define('PHONE_DISPLAY', '+1 (559) 606-0747');
define('PHONE_TEL', '+15596060747');
define('CONTACT_EMAIL', 'info@thubsolutions.net');   // inbox that receives contact-form messages
define('MAIL_FROM', 'info@thubsolutions.net');       // must be a mailbox on this domain for reliable delivery
define('BUSINESS_HOURS', 'Monday–Friday, 9 am – 6 pm Pacific');

/**
 * The four services. Each one gets its own page at /services/{slug}.
 */
$SERVICES = [
    'custom-software' => [
        'name'    => 'Custom Software Development',
        'short'   => 'Software built around how your business actually works — portals, internal tools, and systems that replace spreadsheets and workarounds.',
        'title'   => 'Custom software that fits your business, not the other way around',
        'intro'   => 'Off-the-shelf tools get you most of the way, then force your team into workarounds. We design and build software around your real processes: customer portals, internal dashboards, scheduling and order systems, and integrations that tie your existing tools together.',
        'builds'  => [
            'Customer and partner portals',
            'Internal tools and admin dashboards',
            'Booking, scheduling and order-management systems',
            'Replacements for spreadsheet-driven processes',
            'Integrations between your CRM, accounting and operations software',
            'Modernization of legacy applications',
        ],
        'outcomes' => [
            ['Less manual work', 'Repetitive data entry and copy-paste between systems goes away.'],
            ['One source of truth', 'Everyone works from the same up-to-date data instead of competing spreadsheets.'],
            ['Software you own', 'You get the full source code and documentation. No per-seat license that grows with your team.'],
        ],
        'stack'   => ['PHP / Laravel', 'Node.js', '.NET', 'Python', 'PostgreSQL', 'MySQL', 'React', 'Vue'],
        'faqs'    => [
            ['How long does a custom software project take?', 'A focused first version usually takes 6–12 weeks. We scope the smallest version that solves the core problem, launch it, then build on it with real feedback.'],
            ['Who owns the code?', 'You do. On final payment, the full source code, database and documentation are yours.'],
            ['Can you work with our existing system?', 'Yes. We regularly extend, integrate with, or gradually replace existing applications without stopping your operations.'],
        ],
    ],
    'web-mobile-apps' => [
        'name'    => 'Web & Mobile App Development',
        'short'   => 'Fast websites, web apps, and iOS and Android apps that your customers find easy to use.',
        'title'   => 'Websites and apps your customers actually enjoy using',
        'intro'   => 'Your website and app are often the first place customers meet your business. We build fast, accessible web experiences and native-quality mobile apps, from a marketing site that brings in leads to a full product with accounts, payments and notifications.',
        'builds'  => [
            'Business websites and landing pages',
            'Web applications with user accounts and dashboards',
            'iOS and Android apps from a single codebase',
            'E-commerce stores and online booking',
            'Progressive web apps that work offline',
            'Redesigns of slow or outdated sites',
        ],
        'outcomes' => [
            ['Faster pages', 'Sites built for speed load quickly on phones, rank better and keep visitors from leaving.'],
            ['More enquiries', 'Clear layouts and simple forms turn more visitors into calls and bookings.'],
            ['Easy updates', 'You can change content yourself without calling a developer for every edit.'],
        ],
        'stack'   => ['React', 'Next.js', 'Flutter', 'React Native', 'Swift', 'Kotlin', 'WordPress', 'Shopify'],
        'faqs'    => [
            ['Do you build for both iPhone and Android?', 'Yes. Most apps are built once with Flutter or React Native and released to both stores. We use native Swift or Kotlin when an app needs it.'],
            ['Will I be able to edit my website myself?', 'Yes. We set up a content editor and show your team how to update pages, posts and images.'],
            ['Do you handle App Store and Google Play submission?', 'Yes. We prepare the listings, handle the review process and publish the app under your developer account.'],
        ],
    ],
    'cloud-devops' => [
        'name'    => 'Cloud & DevOps Solutions',
        'short'   => 'Move to the cloud, cut hosting costs, and ship updates safely with automated deployments and monitoring.',
        'title'   => 'Reliable cloud infrastructure without the surprise bills',
        'intro'   => 'Downtime, slow servers and a cloud bill nobody understands all cost money. We migrate applications to AWS, Azure or Google Cloud, set up automated deployments, and put monitoring in place so problems are caught before your customers notice them.',
        'builds'  => [
            'Migration from on-premise or shared hosting to the cloud',
            'Automated build and deployment pipelines (CI/CD)',
            'Infrastructure as code with Terraform',
            'Containers with Docker and Kubernetes',
            'Monitoring, alerting and automated backups',
            'Cloud cost reviews and right-sizing',
        ],
        'outcomes' => [
            ['Lower hosting costs', 'We find idle and oversized resources and size your setup to what you actually use.'],
            ['Safer releases', 'Automated testing and deployment mean updates go out in minutes and can be rolled back in one step.'],
            ['Fewer outages', 'Monitoring and backups mean issues are spotted early and data can always be restored.'],
        ],
        'stack'   => ['AWS', 'Microsoft Azure', 'Google Cloud', 'Docker', 'Kubernetes', 'Terraform', 'GitHub Actions', 'Linux'],
        'faqs'    => [
            ['Will moving to the cloud cause downtime?', 'We plan migrations to run in parallel and switch over during a low-traffic window, so most moves happen with little or no downtime.'],
            ['Which cloud provider should we use?', 'It depends on your existing tools, team skills and budget. We recommend one after reviewing your setup, and we work with all three major providers.'],
            ['Do you offer ongoing support?', 'Yes. We offer monthly support plans that cover monitoring, updates, backups and fixes.'],
        ],
    ],
    'ai-automation' => [
        'name'    => 'AI & Business Automation',
        'short'   => 'Put AI to work on real tasks: answering customers, processing documents, and automating busywork across your tools.',
        'title'   => 'AI and automation that take real work off your team',
        'intro'   => 'AI is most useful when it is connected to your own data and tools. We build practical assistants and automated workflows that answer customer questions, read and sort documents, generate reports, and move information between systems, with a person in the loop wherever it matters.',
        'builds'  => [
            'AI chat assistants trained on your own documents',
            'Automatic processing of invoices, forms and emails',
            'Workflow automation across CRM, email and accounting tools',
            'Automated reporting and dashboards',
            'Lead qualification and follow-up automation',
            'Custom integrations with leading AI models',
        ],
        'outcomes' => [
            ['Hours back every week', 'Routine tasks such as data entry, sorting and follow-ups run on their own.'],
            ['Faster responses', 'Customers get accurate answers at any hour, and complex questions are passed to your team.'],
            ['Your data stays yours', 'We design with privacy in mind and keep sensitive information within approved systems.'],
        ],
        'stack'   => ['OpenAI', 'Anthropic Claude', 'Python', 'LangChain', 'Zapier', 'Make', 'n8n', 'Vector databases'],
        'faqs'    => [
            ['Is AI accurate enough for our business?', 'We start with tasks where accuracy can be checked, test against your real data, and keep a person reviewing anything important before it goes out.'],
            ['Do we need a lot of data to get started?', 'No. Most assistants and automations work with the documents and tools you already have.'],
            ['What does it cost to run?', 'Running costs depend on usage and are usually modest. We estimate them during scoping so there are no surprises.'],
        ],
    ],
];

/** Escape output for HTML. */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
