<?php


if(! function_exists('pll_e'))
{
  function pll_e($str)
  {
    echo $str;
  }
}

if(! function_exists('pll__'))
{
  function pll_e($str)
  {
    return $str;
  }
}



add_action('init', function ()
{

  if (function_exists('pll_register_string'))
  {
    // Breadcrumbs
    pll_register_string('breadcrumb_home', 'Home', 'breadcrumbs');
    pll_register_string('breadcrumb_about', 'About', 'breadcrumbs');
    // Home Page
    pll_register_string('title_first', 'ICO Consulting and', 'Home');
    pll_register_string('title_second', 'Blockchain Technologies', 'Home');
    pll_register_string('title_we_are_coinjapan', 'We are CoinJapan', 'Home');
    pll_register_string('description_we_are_coinjapan', "description_we_are_coinjapan", 'Home', true);
    pll_register_string('btn_we_are_coinjapan', 'Read more', 'Home');


    pll_register_string('title_achievements', 'Achievements', 'Home');
    pll_register_string('header_achievements_one', 'Collected funds', 'Home');
    pll_register_string('header_achievements_two', 'Successful ICOs', 'Home');
    pll_register_string('header_achievements_three', 'Attracted investors', 'Home');
    pll_register_string('milion_achievements', 'Million', 'Home');
    pll_register_string('btn_achievements_milion', 'Read more', 'Home');

    pll_register_string('title_news', 'News', 'Home');
    pll_register_string('title_partners', 'Partners', 'Home');

    // About Page

    pll_register_string('about_our_team_title', 'About', 'About');

    pll_register_string('about_title', 'Who we are', 'About');
    pll_register_string('about_description', 'about_description', 'About', true);
    pll_register_string('about_vision_title', 'Vision', 'About');
    pll_register_string('about_vision_description', 'about_vision_description', 'About', true);
    pll_register_string('about_our_aim_title', 'Our Aim', 'About');
    pll_register_string('about_our_aim_description', 'about_our_aim_description', 'About', true);

    pll_register_string('about_our_team_title', 'Our Team', 'About');



    pll_register_string('about_services_bottom_link', 'Services', 'About');
    pll_register_string('about_projects_bottom_link', 'Projects', 'About');

// SERVICES

    pll_register_string('services_header', 'SERVICES', 'Services');
    pll_register_string('services_desription_header', 'Your success story begins here', 'Services');
    pll_register_string('services_desription', 'services_desription', 'Services', true);

    pll_register_string('services_desription_notes_title', 'Three fundamental conditions for gaining success in the Japanese market:', 'Services');
    pll_register_string('services_desription_notes_note1', 'Professional localization', 'Services');
    pll_register_string('services_desription_notes_note2', 'Effective strategic planning', 'Services');
    pll_register_string('services_desription_notes_note3', 'Willingness to follow the Japanese business rules', 'Services');

    pll_register_string('services_desription_notes2', 'Partnerships with CoinJapan is your guarantee of entering Japanese market for the providing of hyper-growth your product. We can help to raise funds for you because we understand the market, know its features, requirements and business rules.', 'Services', true);

    pll_register_string('services_list_title', 'What we can do for you', 'Services');
    pll_register_string('services_list_item_title1', 'Strategic Advisory', 'Services');
    pll_register_string('services_list_item_description1', 'On the first stage of our cooperation we will help you to appraise the strengths, weaknesses, opportunities and threats of your project. After the appraisal our experts will help you to develop “must do” activities plan to solve problems and use advantages. It allows to prepare for entering in the investment market.', 'Services', true);

    pll_register_string('services_list_item_title2', 'Crowdfunding', 'Services');
    pll_register_string('services_list_item2_note1', 'ICO Strategy and Planning', 'Services');
    pll_register_string('services_list_item2_note2', 'Fundraising via Pre-sale', 'Services');
    pll_register_string('services_list_item2_note3', 'Fundraising via ICO', 'Services');
    pll_register_string('services_list_item2_note4', 'Putting on the listings of Japanese exchanges', 'Services');
    pll_register_string('services_list_item2_note5', 'Affiliate Programs', 'Services');
    pll_register_string('services_list_item2_note6', 'Dashboard Solutions', 'Services');

    pll_register_string('services_list_item_title3', 'Marketing', 'Services');
    pll_register_string('services_list_item3_note1', 'Localization (Whitepaper, Web, Marketing)', 'Services');
    pll_register_string('services_list_item3_note2', 'Online advertisement in Japan', 'Services');
    pll_register_string('services_list_item3_note3', 'Promotion to Japanese Angel Investors', 'Services');
    pll_register_string('services_list_item3_note4', 'Press releases on Japanese media', 'Services');
    pll_register_string('services_list_item3_note5', 'Public Relations', 'Services');
    pll_register_string('services_list_item3_note6', 'Social media control', 'Services');

    pll_register_string('services_list_item_title4', 'Support', 'Services');
    pll_register_string('services_list_item4_note1', 'Legal consultation', 'Services');
    pll_register_string('services_list_item4_note2', 'Sales Channel Development', 'Services');
    pll_register_string('services_list_item4_note3', 'Long Term Business Development', 'Services');
    pll_register_string('services_list_item4_note4', 'Partner Search', 'Services');
    pll_register_string('services_list_item4_note4', 'Sales support', 'Services');


    pll_register_string('services_list2_title', 'Support service for Projects after ICO', 'Services');

    pll_register_string('services_list_item5_title', 'Community Formation', 'Services');
    pll_register_string('services_list_item5_description', 'services_list_item5_description', 'Services', true);


    pll_register_string('services_list_item6_title', 'Meetups for Token Holders', 'Services');
    pll_register_string('services_list_item6_description', 'services_list_item6_description', 'Services', true);

    pll_register_string('services_list_item7_title', 'Crypto Magazines', 'Services');
    pll_register_string('services_list_item7_description', 'services_list_item7_description', 'Services', true);

    pll_register_string('services_list_item8_title', 'Your office in the center of Tokyo', 'Services');
    pll_register_string('services_list_item8_description', 'services_list_item8_description', 'Services', true);

    pll_register_string('services_list_item9_title', 'Sales and Promotion', 'Services');
    pll_register_string('services_list_item9_description', 'services_list_item9_description', 'Services', true);

    pll_register_string('services_list_item10_title', 'Seminars', 'Services');
    pll_register_string('services_list_item10_description', 'services_list_item10_description', 'Services', true);

    pll_register_string('services_list3_title', 'Smart City Project', 'Services');
    pll_register_string('services_list3_content', 'services_list3_content', 'Services', true);

    pll_register_string('services_list4_title', 'Consortium', 'Services');
    pll_register_string('services_list4_content', 'services_list4_content', 'Services', true);


    pll_register_string('services_list5_content', 'To some, the term Smart city sounds vague, the latest slogan to bolster hope for struggling urban centers. But a smart city looks across every aspect of a city\'s operations to use technology to improve outcomes. Let\'s make complex things simple and accessible for everyone.', 'Services', true);
    

    pll_register_string('services_join_consortium_btn','Join the Consortium','Services');

    pll_register_string('services_download_ico_menu_btn', 'Download ICO Menu', 'Services');


// projects

    pll_register_string('projects_header', 'PROJECTS', 'Projects');
    pll_register_string('projects_dercription_header', 'The way of ICO providing is successful with us', 'Projects');
    pll_register_string('projects_description', 'projects_description', 'Projects', true);
    pll_register_string('projects_description_notes_title', 'Our mutual success based on the next components:', 'Projects');
    pll_register_string('projects_description_note1', 'Knowledge the Japanese investors’ interests', 'Projects');

    pll_register_string('projects_description_note2', 'Use of business methods adopted in Japan', 'Projects');
    pll_register_string('projects_description_note3', 'Our reputation growth on the number of successful ICO', 'Projects');
    pll_register_string('projects_description2', 'Cooperation with CoinJapan is the very decision, which will open your business for investments from Japan. We are sure in our capabilities and are able to create solutions for the growth of your project.', 'Projects', true);

    pll_register_string('projects_achivments_header', 'Achievements', 'Projects');
    pll_register_string('projects_achivment1', 'Performed Projects', 'Projects');
    pll_register_string('projects_achivment2', 'Successful ICOs', 'Projects');
    pll_register_string('projects_achivment3', 'Collected funds', 'Projects');
    pll_register_string('projects_achivment3_additional_description', 'Million', 'Projects');
    pll_register_string('projects_achivment4', 'Attracted investors', 'Projects');
    pll_register_string('projects_achivment5', 'Average contribution of one investor', 'Projects');
    pll_register_string('projects_achivment5_additional_description', 'Thousand', 'Projects');
    pll_register_string('projects_achivment6', 'Average time to launching ICO', 'Projects');
    pll_register_string('projects_achivment6_additional_description', 'Month', 'Projects');
    pll_register_string('projects_achivment7', 'Our Clients', 'Projects');


    pll_register_string('projects_note', '*Most projects cannot be shared due to NDA', 'Projects');
    pll_register_string('projects_clients_title', 'What our clients say', 'Projects');
    pll_register_string('projects_clients_says', 'projects_clients_says', 'Projects', true);
    pll_register_string('projects_client', 'Maxim Prasolov', 'Projects');

// partners

    pll_register_string('partners_page_title', 'Partners', 'Partners');
    pll_register_string('partners_description_title', 'In blockchain we trust', 'Partners');
    pll_register_string('partners_description', 'partners_description', 'Partners', true);
    pll_register_string('partners_section_title', 'Partners', 'Partners');

    pll_register_string('partners_partner1_title', 'UVCA', 'Partners');
    pll_register_string('partners_partner1_description', 'Ukrainian Venture Capital and Private Equity Association was established to spread the word about Ukraine’s achievements and opportunities and to support investors in every aspect, from providing reliable information to establishing international connections at the industry and government levels.', 'Partners', true);
    pll_register_string('partners_partner2_title', 'Hacken', 'Partners');
    pll_register_string('partners_partner2_description', 'Hacken is Ecosystem, which includes the international community of white hat hackers and own cryptocurrency Hacken (HKN). The main idea of Hacken Ecosystem is to provide cybersecurity services on tokenized bug bounty marketplace platform HackenProof.', 'Partners', true);
    pll_register_string('partners_partner3_title', 'Hi-Tech Park Belarus', 'Partners');
    pll_register_string('partners_partner3_description', 'HTP Belarus provides special business environment for IT  business. HTP attractiveness is based not on tax benefits and costs alone, but on knowledge, innovation and highly qualified human resources. Belarusian programmers get trained at the training centers of IBM, SAP, Oracle, Microsoft, and other world IT leaders.', 'Partners', true);
    pll_register_string('partners_partner4_title', 'Axon Partners', 'Partners');
    pll_register_string('partners_partner4_description', 'Axon Partners provide the quality services of top-tier consulting companies and law firms but with a different approach. An approach that the technocrats would like to see in their own business: humane, creative and technology-based and that is how it should be nowadays.', 'Partners', true);
    pll_register_string('partners_consorcium_title', 'Consortium', 'Partners');
    pll_register_string('partners_consorcium_description', 'partners_consorcium_description', 'Partners', true);
    pll_register_string('partners_consorcium_btn', 'Application form', 'Partners');

    pll_register_string('partners_call_to_action_title', 'Let\'s start a new chapter of the blockchain together', 'Partners');
    pll_register_string('partners_call_to_action_description', 'partners_call_to_action_description', 'Partners', true);
    pll_register_string('partners_call_to_action_btn', 'Contact us', 'Partners');

    // careers

    pll_register_string('careers_page_header', 'Careers', 'Careers');
    pll_register_string('careers_section1_header', 'What we do', 'Careers');
    pll_register_string('careers_section1_description', 'careers_section1_description', 'Careers', true);
    pll_register_string('careers_section2_header', 'Open positions in CoinJapan', 'Careers');
    pll_register_string('careers_section3_header', 'Our core values', 'Careers');
    pll_register_string('careers_section3_core_values1', 'Move fast', 'Careers');
    pll_register_string('careers_section3_core_values2', 'Make a brave decision', 'Careers');
    pll_register_string('careers_section3_core_values3', 'Share your knowledge', 'Careers');
    pll_register_string('careers_section4_header', 'Our culture', 'Careers');
    pll_register_string('careers_section4_description', 'careers_section4_description', 'Careers', true);

    // contacts

    pll_register_string('contacts_page_header', 'Contacts', 'Contacts');
    pll_register_string('contacts_address1_title', 'CoinJapan KIEV', 'Contacts');
    pll_register_string('contacts_address1_address', 'Office 20, Vatslava Havela Boulevard, 4, Kiev, 03124, Ukraine', 'Contacts');
    pll_register_string('contacts_address1_email', 'sh@coinjapan.io', 'Contacts');
    pll_register_string('contacts_address1_phone', '+380 97 575 9464', 'Contacts');
    pll_register_string('contacts_address2_title', 'CoinJapan MINSK', 'Contacts');
    pll_register_string('contacts_address2_address', '3/19, 258, Gamamika St., 30, Minsk, 22131, Belarus Republic', 'Contacts');
    pll_register_string('contacts_address2_email', 'ad@coinjapan.io', 'Contacts');
    pll_register_string('contacts_address2_email', '+380 63 171 1788', 'Contacts');
    pll_register_string('contacts_section_form_header', 'Let\'s keep in touch', 'Contacts');
    pll_register_string('contacts_section_form_label1', 'Your Name', 'Contacts');
    pll_register_string('contacts_section_form_label2', 'Your Email', 'Contacts');
    pll_register_string('contacts_section_form_label3', 'Message', 'Contacts');
    pll_register_string('contacts_section_form_btn', 'Send now', 'Contacts');
    pll_register_string('contacts_section_form_placeholder1', 'Enter your name', 'Contacts');
    pll_register_string('contacts_section_form_placeholder2', 'Enter your email address', 'Contacts');
    pll_register_string('contacts_section_form_placeholder3', 'Your message here', 'Contacts');

    // news

    pll_register_string('news_page_header', 'News', 'News');
    pll_register_string('news_section_header', 'Our latest news', 'News');
    pll_register_string('news_section_description', 'Discover the latest breaking news about the blockchain and ICO around the world.', 'News');

  }
});
