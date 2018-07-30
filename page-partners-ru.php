<?php 
$args = [
  'post_type' => 'companies',
  'posts_per_page' => -1,
  'meta_key' => 'type',
  'meta_value' => 'partner',
  'meta_compare' => 'LIKE'
];

$partners = new WP_Query($args);

?>

<?php get_header() ?>

<section class="page-title partners-title-bg" data-parallax="scroll">
  <div class="page-titke-overlay">
    <div class="cj-container">
      <h1><?php pll_e('Partners')?></h1>
      <ul class="breadcrumbs">
        <li><a href="<?=get_permalink(get_page_by_path('home'))?>"><?php pll_e('Home')?></a></li>
        <li><a href="#"><?php pll_e('Partners')?></a></li>
      </ul>
    </div>
  </div>
</section><!-- TITLE -->

<section class="partners-page-description">
  <div class="cj-container">
    <h2 class="page-main-heading"><?php pll_e('In blockchain we trust')?></h2>
    <article class="partners-page-description-wrapper">
      <p><?php pll_e('partners_description')?></p>
    </article>
  </div>
</section>

<section class="partners-page-picture-separator">
  <div class="cj-container" data-fix-img-position="img-container">
    <img src="<?=CJ_MEDIA_ROOT?>/images/pages/content/partners1.png" alt="City Views">
  </div>
</section>

<section class="partners-page-partners">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Partners')?></h2>
    <div class="row no-gutters">
      <div class="col-1 arrow-img-container">
        <img class="arrow-left-img" src="<?=CJ_MEDIA_ROOT?>/controls/left-arrow.png" alt="left arrow">
      </div>
      <div class="col-10">
        <div class="owl-carousel partners-list-wrapper" data-css-animate="trigger">
          <?php while ( $partners->have_posts() ) : $partners->the_post(); ?>

            <?php 
            $custom_fields = get_post_custom(get_the_ID());
            $label = $custom_fields['reference_label'][0];
            $reference = $custom_fields['reference'][0];
            ?>

            <div class="partner-item-wrapper">
              <div class="partner-image-wrapper">
                <img src="<?=get_the_post_thumbnail_url() ?>" alt="<?php the_title() ?>">
              </div>
              <h3 class="partner-name"><?php the_title() ?></h3>
              <div class="partner-description"><?php the_content(); ?></div>
              <a href="<?=$reference?>" class="partner-link"><?=$label?></a> 
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="col-1 arrow-img-container">
        <img class="arrow-right-img" src="<?=CJ_MEDIA_ROOT?>/controls/right-arrow.png" alt="right arrow">
      </div>
    </div>
  </div>
</section>

<section class="partners-page-partners">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Consortium')?></h2>
    <div class="row no-gutters" data-css-animate="trigger">
      <div class="col-md-12">
        <article class="partners-page-description-wrapper pt-5">
          <?php
          pll_e("partners_consorcium_description");
          ?>
        </article>
      </div>
    </div>
    <div class="row no-gutters pb-5">
      <div class="owl-carousel partners-list-wrapper" data-css-animate="trigger">
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/kasko-2-go.png" alt="Kasko2GO">
          </div>
          <h3 class="partner-name">Kasko2GO</h3>
          <p class="partner-description">Kasko2GO is an ecosystem that offers low-risk drivers insurance at a fraction
            of the cost other companies charge. AI picks up low-risk customers for insurance companies, military grade
          security ensures there are no frauds. Purchasing insurance becomes faster and cheaper.</p>
          <a href="//kasko2go.com/" class="partner-link">kasko2go.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/engagement-token.png" alt="Engagement Token">
          </div>
          <h3 class="partner-name">Engagement Token</h3>
          <p class="partner-description">The aim of Engagement Token is to transform online publishing industry. Using
            AI-based analytics system allows advertisers to place their ads where people engage, making them more
            effective. Publishers and active users are rewarded in tokens. It is already implemented in L.A. Times and
          Chicago Tribune.</p>
          <a href="//engagementtoken.com/" class="partner-link">engagementtoken.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/482-solution.png" alt="482 Solution">
          </div>
          <h3 class="partner-name">482 Solution</h3>
          <p class="partner-description">482.solutions is global full cycle software development team, that
            specialises on blockchain integration, R&D and IoT-related technologies. Their ultimate mission is to do
          their part in making a decentralized future a little bit closer.</p>
          <a href="//482.solutions/" class="partner-link">482.solutions</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/romad.png" alt="Romad">
          </div>
          <h3 class="partner-name">Romad</h3>
          <p class="partner-description">ROMAD Endpoint Defense is an award winning antivirus provider. Computers with
            ROMAD installed were not hit by WannaCry. It functions on the patented approach of combating virus
          families, not separate strains. If a node notices a new strain, the whole system knows about it.</p>
          <a href="//romad.io/" class="partner-link">romad.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/endo.png" alt="Endo">
          </div>
          <h3 class="partner-name">Endo</h3>
          <p class="partner-description">Endo is a certified data verification protocol that improves data management.
            The system stores users’ personal data anonymously for KYC purposes. Skills, experience or certificates
            can be approved by trustworthy organisations. Third party developers can create verification apps within
          the platform.</p>
          <a href="//endo.im/" class="partner-link">endo.im</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bitupper.png" alt="Bitupper">
          </div>
          <h3 class="partner-name">Bitupper</h3>
          <p class="partner-description">Bitupper is a complex solution for the world of crypto. The platform combines
            blockchain browser and a wallet, but it has to offer much more to the business clients. Bitupper provides
          an API for development of blockchain-based applications and helps to raise funds during an ICO.</p>
          <a href="//bitupper.com/ru/" class="partner-link">bitupper.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/animal-id.png" alt="Animal ID">
          </div>
          <h3 class="partner-name">Animal ID</h3>
          <p class="partner-description">Animal-id.info is a database that helps people find their lost pets.
            Integration with affiliate vets in over 15 countries allow users to monitor their pets’ health and receive
          invoices for regular procedures. If a pet is lost, other users can scan a QR code to notify the owner.</p>
          <a href="//animal-id.info/" class="partner-link">animal-id.info</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/crystals.png" alt="Crystals">
          </div>
          <h3 class="partner-name">Crystals</h3>
          <p class="partner-description">Crystals takes blockchain to one of the oldest, yet currently underdeveloped
            jobs, modelling. This platform is an aggregator for modelling industry, bringing all the participants on
            the market in one decentralized marketplace. Models and modelling agencies do not pay any fees, only
          customers do.</p>
          <a href="//crystals.io/" class="partner-link">crystals.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/geo-pay.png" alt="Geo Pay">
          </div>
          <h3 class="partner-name">Geo Pay</h3>
          <p class="partner-description">GEO Pay is a payment system that charges no fees for transactions. Only
            businesses have to pay a small monthly fee for using the system. It is possible for users to create a
          “line of trust” with your relatives or friends to allow them to use some of your funds.</p>
          <a href="//geo-pay.net/" class="partner-link">geo-pay.net</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/k-chain.png" alt="K Chain">
          </div>
          <h3 class="partner-name">K Chain</h3>
          <p class="partner-description">KCHAIN is a global market leader in blockchain consulting. It helps
            businesses create blockchain-based solutions and guides them in terms of strategy and digital technology.
            KCHAIN’s help allows companies to maximise the value they are giving to the market, multiplying their
          chances for success.</p>
          <a href="//www.kchain.kr/" class="partner-link">kchain.kr</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/neuromation.png" alt="Neuromation">
          </div>
          <h3 class="partner-name">Neuromation</h3>
          <p class="partner-description">Recommended by Hacked.com, Neuromation is an innovative startup that can
            begin a revolution in AI development. Deep learning needs precise labeling of data, and this is exactly
            what Neuromation does. It sells labeled datasets synthesized by AI. The possibilities this creates are
          endless.</p>
          <a href="//www.neuromation.io/ru/" class="partner-link">neuromation.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/krypton-capital.png" alt="Krypton Capital">
          </div>
          <h3 class="partner-name">Krypton Capital</h3>
          <p class="partner-description">Krypton Capital is a leading early stage venture firm that specifically
            focuses on blockchain-related projects. Its team has been on the market for over 12 years, and helped
          raise $300 mio for different projects. The company is very active on events of the crypto world.</p>
          <a href="//krypton.capital/" class="partner-link">krypton.capital</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/skillonomy.png" alt="Skillonomy">
          </div>
          <h3 class="partner-name">Skillonomy</h3>
          <p class="partner-description">Skillonomy is a P2P educational platform that tokenises every productive
            student’s action to give them incentives to study harder. The platform is income oriented and works on a
            “success fee”, a payment that a student makes after they started monetizing the skills they gained in the
          market.</p>
          <a href="//skillonomy.org/" class="partner-link">skillonomy.org</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/krypton-events.png" alt="Krypton Events">
          </div>
          <h3 class="partner-name">Krypton Events</h3>
          <p class="partner-description">Krypton Events brings together entrepreneurs, investors, and influential
            people in the industry, making crypto world a smaller place. Meeting new people and discussing
            possibilities is how new ideas are born. Krypton Events aims to create an atmosphere, where this can
          happen.</p>
          <a href="//www.kryptonevents.com/" class="partner-link">kryptonevents.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/true-play.png" alt="TruePlay">
          </div>
          <h3 class="partner-name">TruePlay</h3>
          <p class="partner-description">TruePlay provides blockchain-based software solutions for online gaming
            industry. The technology they use makes gambling transparent and provably fair, allowing users to avoid
            hacks. While other gambling startups can improve the industry, this one can change it and improve it on a
          global scale.</p>
          <a href="//trueplay.io/" class="partner-link">trueplay.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/x-10-agency.png" alt="X-10 agency">
          </div>
          <h3 class="partner-name">X-10 agency</h3>
          <p class="partner-description">X10 is a marketing agency that provides complex solutions for ICOs. The
            company does community management, creates a custom bounty campaign, grow clients’ telegram chats and make
          users engage. They also provide insight into Asian market and have a team that works with this area.</p>
          <a href="//x10.agency/" class="partner-link">x10.agency</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/byzantium.png" alt="Byzantium">
          </div>
          <h3 class="partner-name">Byzantium</h3>
          <p class="partner-description">Byzantium is an immersive end-to-end blockchain service provider, with a
            diverse team that has background in blockchain technology, investing, PR, and marketing. The company
          specializes in marketing and fundraising and has raised more than $150 mio for its clients.</p>
          <a href="//www.bzntm.com/" class="partner-link">bzntm.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/vu-token.png" alt="VU Token">
          </div>
          <h3 class="partner-name">VU Token</h3>
          <p class="partner-description">VU is a VR game, lead by an award winning CEO. It lets users experience the
            unending variety of worlds, events and stories, created by an artificial intelligence. Sharing the
          experience of creating something or following a storyline with friends is unforgettable.</p>
          <a href="//www.vutoken.io/" class="partner-link">vutoken.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/super-text.png" alt="Super Text">
          </div>
          <h3 class="partner-name">Super Text</h3>
          <p class="partner-description">Supertext is a group chat without the necessity of having an app. When
            internet connection is unavailable, the service delivers messages that would have appeared in the app via
          SMS. All the other features that you are used to in your favourite messenger are present.</p>
          <a href="//getsupertext.com/" class="partner-link">getsupertext.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/joinjapan.png" alt="JoinJapan">
          </div>
          <h3 class="partner-name">JoinJapan</h3>
          <p class="partner-description">Japan is not an easy market to enter. Join Japan helps businesses in this
            difficult task. Receive consultation and guidance on finding business partners and establishing
          relationships with them. Join Japan makes cooperation with your Japanese buyers or suppliers easy.</p>
          <a href="//joinjapan.com.ua/" class="partner-link">joinjapan.com.ua</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/usp-capital.png" alt="USP Capital">
          </div>
          <h3 class="partner-name">USP Capital</h3>
          <p class="partner-description">USP CAPITAL makes venture investments in technology startups and supports
            high-tech teams of PhD researchers, whose discoveries can be implemented in the business world. The team
          looks for new ideas worldwide, since they have experience in cross-border investments.</p>
          <a href="//uspfund.com/" class="partner-link">uspfund.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/module.png" alt="Module">
          </div>
          <h3 class="partner-name">Module</h3>
          <p class="partner-description">MODULE is a disruptive blockchain solution for decentralised files storage.
            Working on Proof of Space, Time and Transaction protocol, the platform allows mobile phone owners rent
          their unused data storage capacity for fees in the company’s tokens.</p>
          <a href="//modltoken.io/" class="partner-link">modltoken.io</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/olam-foundation.png" alt="Olam Foundation">
          </div>
          <h3 class="partner-name">Olam Foundation</h3>
          <p class="partner-description">Olam foundation is an open-source project, developed by an NGO to change the
            way supply chains work. Aiming at reducing carbon imprint and the amount of paper used for handling a
            shipping the old way, Olam introduces a decentralized system for shipping management that brings down cost
          90%</p>
          <a href="//www.olam-platform.org/" class="partner-link">olam-platform.org</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bettium.png" alt="Bettium">
          </div>
          <h3 class="partner-name">Bettium</h3>
          <p class="partner-description">Bettium is a P2P betting platform that enables users to leverage the power of
            analysing Big Data with the help of experts and specially trained AI algorithms to bet on sports against
          each other. With all the tools one can dream of, Bettium makes success a matter of strategy, not luck.</p>
          <a href="https://bettium.com/" class="partner-link">bettium.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/stox.png" alt="Stox">
          </div>
          <h3 class="partner-name">Stox</h3>
          <p class="partner-description">Stox is an open source project for prediction market. Stake up tokens on
            predictions in politics, sports, and many other fields to win money. Stox leverages the power of the crowd
          to receive the most accurate predictions.</p>
          <a href="//www.stox.com/" class="partner-link">stox.com</a>
        </div>
        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/xenchain.png" alt="Xenchain">
          </div>
          <h3 class="partner-name">Xenchain</h3>
          <p class="partner-description">Xenchain is a KYC solution that makes old methods of authentication obsolete.
            It involves facial recognition, but leaves the user anonymous, letting only them choose who has access to
            what information about them. Xenchain is one of the first companies to bring blockchain to this
          industry.</p>
          <a href="//xenchain.io/" class="partner-link">xenchain.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/longenesis.png" alt="Longenesis">
          </div>
          <h3 class="partner-name">Longenesis</h3>
          <p class="partner-description">Longenesis is a Life Data Marketplace, that allows users to monetize their
            personal data in an anonymous form, receiving reward for sharing it with medical researchers. The main
            goal of the company is to facilitate large scale medical research and to battle life threatening
          diseases.</p>
          <a href="//longenesis.com/" class="partner-link">longenesis.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/digitalx.png" alt="DigitalX">
          </div>
          <h3 class="partner-name">DigitalX</h3>
          <p class="partner-description">DigitalX taps into crypto ecosystem by helping businesses run ICOs and
            consulting on developing blockchain based projects. Services range from technical analysis to supporting a
            marketing campaign. It facilitated a number of successful projects to hold an ICO and enter their target
          markets.</p>
          <a href="//www.digitalx.com/" class="partner-link">digitalx.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/rsk.png" alt="RSK">
          </div>
          <h3 class="partner-name">RSK</h3>
          <p class="partner-description">RSK network calls itself smarter Bitcoin. It is an open-source ecosystem for
            smart contracts, that improves Bitcoin by enabling smart-contracts, almost instant payments and a
            scalability level, similar to that of PayPal. It does not compete with Bitcoin, but takes it to another
          level.</p>
          <a href="//www.rsk.co/" class="partner-link">rsk.co</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/cosplay-token.png" alt="Cosplay">
          </div>
          <h3 class="partner-name">Cosplay</h3>
          <p class="partner-description">Cure WorldCosplay deals with cosplay. For those who are surprised by the
            fact, cosplay is a $180 bn industry. This platform allows cosplayers to take control of their career and
          start receiving money in the form of tokens for their content.</p>
          <a href="//cot.curecos.com/" class="partner-link">cot.curecos.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/bidooh.png" alt="Bidooh">
          </div>
          <h3 class="partner-name">Bidooh</h3>
          <p class="partner-description">Bidooh is Google Adwords for Out of Home advertising industry. It brings all
            local advertisers together to let them reach a very targeted audience, creating an ad in minutes. Display
            your ad on a digital screen in a shopping mall or a gas station and know the exact amount of impression it
          had.</p>
          <a href="//www.bidooh.com/" class="partner-link">bidooh.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/terra-virtua.png" alt="Terra Virtua">
          </div>
          <h3 class="partner-name">Terra Virtua</h3>
          <p class="partner-description">Crypto News Review calls Terra Virtua “the Netflix of VR”. This company
            creates a VR ecosystem that offers users immersive entertainment and allows third party developers to join
          it with their own projects. The virtual world has its own economic system, powered by TVA tokens.</p>
          <a href="//terravirtua.io/" class="partner-link">terravirtua.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/menlo-one.png" alt="Menlo One">
          </div>
          <h3 class="partner-name">Menlo One</h3>
          <p class="partner-description">Menlo One provides tools for the world of crypto. It is a framework for
            building decentralized applications that work just as fast as traditional apps do. Menlo One brings speed
            and comfort that users are accustomed to in regular apps to Web 3.0, effectively making the future
          possible.</p>
          <a href="//www.menlo.one/" class="partner-link">menlo.one</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/azbit.png" alt="AZbit">
          </div>
          <h3 class="partner-name">AZbit</h3>
          <p class="partner-description">Azbit offers a complex financial solution for the cryptocurrency industry. It
            provides a banking ecosystem and a crypto wallet, allows marginal and algorithmic trading and introduces
            an investment platform with social trading. Azbit also creates a marketplace for trading bots and
          algorithms.</p>
          <a href="//azbit.com/ru" class="partner-link">azbit.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/askfm.png" alt="AskFM">
          </div>
          <h3 class="partner-name">AskFM</h3>
          <p class="partner-description">“Your answer is an asset” is the motto of ASKfm 2.0, a social network that
            stems from an already existing successful business. Its predecessor, ASK.fm, is the largest Q&A social
            network. Once it is tokenized, users will be able to ask and answer questions, receiving rewards for
          quality content.</p>
          <a href="//askfm.io" class="partner-link">askfm.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/keos.png" alt="Keos">
          </div>
          <h3 class="partner-name">Keos</h3>
          <p class="partner-description">KEOS is a joint venture of KCHAIN and TokenPost that drives the EOS movement
            in Korea and around the world. The company develops apps that work on EOS and is a large EOS
            block-producer. EOS is currently the most popular blockchain media in Korea. With the help of KEOS and the
          insight of KCHAIN it can be the best in the world.</p>
          <a href="//www.keos.kr/" class="partner-link">keos.kr</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/skyfchain.png" alt="Skychaina">
          </div>
          <h3 class="partner-name">Skychaina</h3>
          <p class="partner-description">Highly rated by top ICO review sites, SKYFchain truly presents a revolution.
            It is a B2R (business-to-robots) platform that allows leasing robots and managing unmanned logistics
          systems. It is already working with its pioneer clients and delivers great results.</p>
          <a href="//www.skyfchain.io" class="partner-link">skyfchain.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/givingledger.png" alt="GivingLedger">
          </div>
          <h3 class="partner-name">GivingLedger</h3>
          <p class="partner-description">Giving Ledger is a project powered by KCHAIN that brings blockchain to
            charity. Giving becomes transparent, sustainable and worthwhile. This restores trust in charity
            organizations as all transactions with gathered funds are traceable. Giving Ledger prioritises making a
          change with innovation.</p>
          <a href="//www.givingledger.com/" class="partner-link">givingledger.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/thetokenpost.png" alt="TokenPost">
          </div>
          <h3 class="partner-name">TokenPost</h3>
          <p class="partner-description">TokenPost is a leading provider of crypto-related news, analytics of trends,
            appearing technologies, companies and startups. It went as crypto as launching its own token. TokenPost is
          your go-to place if you want to know something about cryptocurrency or blockchain.</p>
          <a href="//thetokenpost.com/" class="partner-link">thetokenpost.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/clash-go.png" alt="Clash & Go">
          </div>
          <h3 class="partner-name">Clash & Go</h3>
          <p class="partner-description">Clash & GO is a mobile RTS game that combines Augmented Reality with
            blockchain. Build a city while participating in intense PvP battles in real time. Use CGO tokens to
            manipulate the fusion of virtual and real worlds. The combination of AR and blockchain is the recipe for
          success in Asian region.</p>
          <a href="//ico.clashgo.com/" class="partner-link">ico.clashgo.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/disciplina.png" alt="Disciplina">
          </div>
          <h3 class="partner-name">Disciplina</h3>
          <p class="partner-description">DISCIPLINA is a multifunctional blockchain that is best implemented in
            education and recruiting. It aims at creating a database of academic and professional achievements that
          are validated by employers and education providers to simplify the inner workings of the job market.</p>
          <a href="//disciplina.io/" class="partner-link">disciplina.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/achiva.png" alt="Achiva">
          </div>
          <h3 class="partner-name">Achiva</h3>
          <p class="partner-description">Achiva Network is a blockchain based affiliate marketing network. The
            platform offers tools for effective cooperation between advertisers and webmasters. This business has been
            in operation for 12 years now, and finished more than 150 large scale marketing projects.
          </p>
          <a href="//achiva.agency/" class="partner-link">achiva.agency</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/helios-coin.png" alt="HeliosCoin">
          </div>
          <h3 class="partner-name">HeliosCoin</h3>
          <p class="partner-description">Helios produces autonomous mining clusters, machinery that is able to mine
            cryptocurrency, switching between currencies with the fluctuations of the market to ensure maximum
            efficiency. The clusters are powered by green energy from solar panels. ICO investors expect great
          profits.</p>
          <a href="//www.helioss.io/" class="partner-link">helioss.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/rido.png" alt="Rido">
          </div>
          <h3 class="partner-name">Rido</h3>
          <p class="partner-description">Rido is Uber that meets crypto. Enjoy the dapp and pay for trips with
            cryptocurrency. The company attracts businesses to participate in the system by providing them with tools
          to monitor their car pool and manage the operations. The app is already released for iOS and Android.</p>
          <a href="//rido.io/driver/" class="partner-link">rido.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/darfchain.png" alt="Darfchain">
          </div>
          <h3 class="partner-name">Darfchain</h3>
          <p class="partner-description">DARFChain believes in tokenomy and strives to improve it. It is a blockchain
            driven ERP system, that provides ICO investors with a safe and secure way of purchasing ICO tokens. A
            system of escrows and post-investing methodology makes it virtually risk-free, engaging more people in
          crypto market.</p>
          <a href="//darfchain.com/" class="partner-link">darfchain.com</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/archi-coin.png" alt="ArchiCoin">
          </div>
          <h3 class="partner-name">ArchiCoin</h3>
          <p class="partner-description">ArchiCoin is a blockchain driven distributed storage. It uses cryptography
            and stores users’ data in various servers around the world, instead of a single one, to ensure the best
          quality of protection and possibilities for data restoration.</p>
          <a href="//archicoin.io/" class="partner-link">archicoin.io</a>
        </div>

        <div class="partner-item-wrapper">
          <div class="partner-image-wrapper">
            <img src="<?=CJ_MEDIA_ROOT?>/images/consortium/yumerium.png" alt="Yumerium">
          </div>
          <h3 class="partner-name">Yumerium</h3>
          <p class="partner-description">Yumerium is a token that can be earned by playing, sharing and promoting a
            new game that is integrated in the platform. Gamers can then spend YUM tokens in any game that supports
            it. Yumerium has partnerships with a couple of game developers and will be used to promote their
          products.</p>
          <a href="//yumerium.com/tokensales" class="partner-link">yumerium.com</a>
        </div>

      </div>
    </div>

    <div class="row no-gutters">
      <div class="cj-btn-container">
        <a href="//docs.google.com/forms/d/e/1FAIpQLScahoaxWGjHVZV1RpI3emge6SGYJMn1CS_n4YSAnQyYWje62A/viewform" class="cj-btn" data-css-animate="trigger"><span><?php pll_e("Application form")?></span></a>
      </div>
    </div>
  </div>
</section>

<section class="partners-page-wanted">
  <div class="cj-container">
    <h2 class="section-header" data-css-animate="trigger"><?php pll_e('Let\'s start a new chapter of the blockchain together')?></h2>
    <article class="partners-page-wanted-text-wrapper" data-css-animate="trigger">
      <p><?php pll_e('partners_call_to_action_description')?></p>
    </article>

    <div class="cj-btn-container">
      <a href="<?=get_permalink(get_page_by_path('contacts'))?>#contact-form" class="cj-btn"
       data-css-animate="trigger"><span><?php pll_e('Contact us')?></span></a>
     </div>
   </div>
 </section>
 <?php get_footer() ?>