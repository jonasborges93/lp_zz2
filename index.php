<?php
header('Content-Type: text/html; charset=utf-8');
if (isset($_POST['submit'])) {

  //INCLUINDO ARQUIVO DE CONFIGURACAO DO DATABASE
  include_once('config.php');

  //// Define o fuso horário para São Paulo
  date_default_timezone_set('America/Sao_Paulo');

  //RECUPERANDO INFORMAÇÕES DO FORMULÁRIO
  $formName = mb_convert_encoding($_POST['formName'], 'UTF-8', 'auto');
  $formEmail = mb_convert_encoding($_POST['formEmail'], 'UTF-8', 'auto');
  $formPhone = mb_convert_encoding($_POST['formPhone'], 'UTF-8', 'auto');
  $formMessage = mb_convert_encoding($_POST['formMessage'], 'UTF-8', 'auto');
  $sentDate = date('Y-m-d H:i:s');

  //INSERINDO OS DADOS NO DATABASE PREVININDO SQL INJECTION
  $result = $conexao->prepare("INSERT INTO formulario_contato(name,email,phone,message,sentDate) VALUES (?,?,?,?,?)");
  $result->bind_param("sssss", $formName, $formEmail, $formPhone, $formMessage, $sentDate);

  // VERIFICANDO SE DEU CERTO A INSERÇÃO NO BANCO
  if ($result->execute()) {
    echo "<script>alert('Mensagem enviada com sucesso!');</script>";
  } else {
    echo "<script>alert('Erro no envio da mensagem: '"  . $result->error . ")</script>";
  }

  // FECHANDO AS CONEXÕES COM O DATABASE
  $result->close();
  $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/styles.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap"
    rel="stylesheet" />

  <title>LP ZZ2 - Jonas Borges</title>
</head>

<body>
  <section class="sectionHero">
    <div class="container">
      <div class="sectionHero__content">
        <img
          class="sectionHero__logo"
          src="./assets/images/Logo-transparente-site.webp"
          alt="Logo zz2" />
        <h1 class="sectionHero__title">
          Transforme seu veículo com tecnologia inovadora!
        </h1>
        <p class="sectionHero__description">
          Soluções automotivas que combinam inovação, segurança e
          conectividade
        </p>
        <a href="#contact" class="sectionHero__button button">Conheça nossas soluções</a>
      </div>
    </div>
  </section>

  <section class="sectionBenefits">
    <div class="container">
      <!-- <h2 class="sectionBenefits__title">O que nos torna únicos?</h2> -->
      <div class="sectionBenefits__wrapper">
        <article class="itemBenefits">
          <img
            class="itemBenefits__icon"
            src="./assets/images/icon_pag.png"
            alt="Icone" />
          <h4 class="itemBenefits__title">
            Soluções personalizadas para empresas e consumidores
          </h4>
          <p class="itemBenefits__text">
            Somos uma empresa com alta tecnologia, garantindo conectividade,
            segurança, entretenimento com produtos de última geração.
          </p>
        </article>
        <article class="itemBenefits">
          <img
            class="itemBenefits__icon"
            src="./assets/images/icon_pag.png"
            alt="Icone" />
          <h4 class="itemBenefits__title">
            Suporte técnico humanizado e de alta qualidade.
          </h4>
          <p class="itemBenefits__text">
            Contamos com uma equipe de suporte técnico preparada para auxiliar
            de forma personalizada, desde a desmontagem do veículo até a
            conclusão da instalação.
          </p>
        </article>
        <article class="itemBenefits">
          <img
            class="itemBenefits__icon"
            src="./assets/images/icon_pag.png"
            alt="Icone" />
          <h4 class="itemBenefits__title">
            Engenharia própria, garantindo durabilidade e inovação.
          </h4>
          <p class="itemBenefits__text">
            Desenvolvemos soluções com foco no mercado automotivo brasileiro,
            garantindo a máxima compatibilidade e credibilidade dos produtos.
          </p>
        </article>
      </div>
      <a href="#contact" class="sectionBenefits__button button">Converse com um especialista agora</a>
    </div>
  </section>

  <section class="sectionSolution">
    <div class="container">
      <div class="sectionSolution__wrapper">
        <div class="sectionSolution__left">
          <h2 class="sectionSolution__title">
            Soluções que transformam sua experiência automotiva
          </h2>
          <p class="sectionSolution__text">
            Explore tecnologias que elevam sua experiência automotiva, com
            produtos projetados para oferecer conectividade, segurança e
            comodidade no dia a dia.
          </p>
          <a href="#contact" class="sectionSolution__button button">Encontre a solução para você</a>
        </div>
        <div class="sectionSolution__right">
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/files/ZU21.jpg?v=1710934165&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Streaming</h4>
            <p class="card-item__text">
              Entretenimento potente e de alta qualidade na tela do seu carro
            </p>
          </div>
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/files/IT3-MMI3G-A6-Q701_def66da9-10ff-4b08-8488-d97306164f0a.png?v=1724263409&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Carplay</h4>
            <p class="card-item__text">
              Melhore sua experiência de condução integrando seu Apple ou
              Android à tela do veículo
            </p>
          </div>
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/files/Bike2Play1_6.jpg?v=1724165565&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Bike 2 play</h4>
            <p class="card-item__text">
              CarPlay para motos inédito no Brasil. Disponível em dois
              modelos: com ou sem câmera DVR
            </p>
          </div>
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/products/IC-EVO2-TV-1.jpg?v=1724263230&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Interface de Câmeras</h4>
            <p class="card-item__text">
              Possibilita a instalação de câmera de ré e câmera frontal para
              auxiliar nas manobras
            </p>
          </div>
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/files/Carregador_Port_til_ZZPOWER_7.4Kw_32A.png?v=1724338827&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Carregadores Veiculares</h4>
            <p class="card-item__text">
              Carregue seu veículo elétrico de maneira mais rápida e prática
            </p>
          </div>
          <div class="card-item">
            <img
              src="https://zzdois.com.br/cdn/shop/files/ZZAIR-DUO1.jpg?v=1707500316&width=713"
              alt="Imagem do Produto/Serviço"
              class="card-item__image" />
            <h4 class="card-item__title">Acessórios</h4>
            <p class="card-item__text">
              Complemente as interfaces com TV Digital, interfaces de áudio,
              câmeras, entre outros
            </p>
          </div>
        </div>
        <a href="#contact" class="sectionSolution__button-mobile button">Encontre a solução para você</a>
      </div>
    </div>
  </section>

  <section class="sectionHistory">
    <div class="sectionHistory__item">
      <div class="sectionHistory__wrapper">
        <div class="sectionHistory__image">
          <img src="./assets/images/history-1.jpg" alt="" />
        </div>
        <div class="sectionHistory__content">
          <div class="container">
            <h3 class="sectionHistory__title">
              15 anos de inovação no mercado automotivo
            </h3>
            <p class="sectionHistory__text">
              A ZZ2 tem uma trajetória de sucesso com 15 anos de experiência,
              consolidando-se como pioneira no Brasil no desenvolvimento de
              soluções automotivas inovadoras. Desde o início, a empresa teve
              como prioridade a qualidade, com engenharia e fabricação
              próprias, entregando produtos que combinam alto desempenho e
              confiabilidade.
            </p>
            <a href="#contact" class="sectionHistory__button button">Fale conosco para saber mais!</a>
          </div>
        </div>
      </div>
    </div>
    <div class="sectionHistory__item--reverse">
      <div class="sectionHistory__wrapper">
        <div class="sectionHistory__image">
          <img src="./assets/images/history-2.jpg" alt="" />
        </div>
        <div class="sectionHistory__content">
          <div class="container">
            <h3 class="sectionHistory__title">
              Expansão internacional e reconhecimento global
            </h3>
            <p class="sectionHistory__text">
              Em 2019, a ZZ2 deu um passo marcante com sua entrada no mercado
              dos Estados Unidos, solidificando sua posição como referência no
              setor. A expansão continuou com a conquista de mercados na
              Europa, oferecendo soluções que integram segurança,
              entretenimento, tecnologia e comodidade aos veículos.
            </p>
            <a href="#contact" class="sectionHistory__button button">Saiba mais sobre nossa história"</a>
          </div>
        </div>
      </div>
    </div>
    <div class="sectionHistory__item">
      <div class="sectionHistory__wrapper">
        <div class="sectionHistory__image">
          <img src="./assets/images/history-3.jpg" alt="" />
        </div>
        <div class="sectionHistory__content">
          <div class="container">
            <h3 class="sectionHistory__title">
              Foco no cliente: Qualidade e confiança garantidas
            </h3>
            <p class="sectionHistory__text">
              Mais do que qualidade, a ZZ2 se destaca pela assistência técnica
              humanizada, garantindo confiança e tranquilidade a lojistas e
              consumidores finais. Cada produto é respaldado por uma garantia
              que reflete o compromisso da empresa com a satisfação do cliente
              e a durabilidade de suas soluções.
            </p>
            <a href="#contact" class="sectionHistory__button button">Descubra nossa atuação global</a>
          </div>
        </div>
      </div>
    </div>
    <div class="sectionHistory__item--reverse">
      <div class="sectionHistory__wrapper">
        <div class="sectionHistory__image">
          <img src="./assets/images/history-4.jpg" alt="" />
        </div>
        <div class="sectionHistory__content">
          <div class="container">
            <h3 class="sectionHistory__title">
              Uma equipe movida pela inovação e pelo futuro
            </h3>
            <p class="sectionHistory__text">
              O sucesso da ZZ2 é fruto de uma equipe de profissionais
              engajados, que compartilham a visão de oferecer o melhor
              atendimento e inovação. Ao olhar para o futuro, a ZZ2 continua
              firme em sua missão de liderar o mercado automotivo com soluções
              que proporcionam experiências excepcionais aos clientes.
            </p>
            <a href="#contact" class="sectionHistory__button button">Fale com nossos especialistas</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sectionTestimonials">
    <div class="container">
      <h2 class="sectionTestimonials__title">
        Clientes satisfeitos, resultados reais
      </h2>
      <p class="sectionTestimonials__text">
        Descubra como a ZZ2 transforma experiências automotivas, entregando
        soluções que encantam lojistas e consumidores. São histórias de
        confiança, inovação e qualidade comprovada em cada projeto.
      </p>
      <div class="sectionTestimonials__wrapper">
        <div class="card-testimonials">
          <div class="card-testimonials__top">
            <img
              src="./assets/images/customer-testimonial.svg"
              alt="Icone de Depoimento"
              class="card-testimonials__icon" />
            <p class="card-testimonials__text">
              Comprei o CarPlay da ZZ2 e minha experiência de dirigir mudou
              completamente. Conectividade perfeita e instalação super
              simples. Recomendo!
            </p>
          </div>
          <div class="card-testimonials__bottom">
            <img
              src="./assets/images/profile-man.jpg"
              alt="Foto do Cliente"
              class="card-testimonials__profile" />
            <div class="card-testimonials__info">
              <p class="card-testimonials__name">João Martins</p>
              <p class="card-testimonials__complement">CarPlay</p>
            </div>
          </div>
        </div>
        <div class="card-testimonials">
          <div class="card-testimonials__top">
            <img
              src="./assets/images/customer-testimonial.svg"
              alt="Icone de Depoimento"
              class="card-testimonials__icon" />
            <p class="card-testimonials__text">
              Os produtos da ZZ2 são os mais procurados pelos nossos clientes.
              A qualidade é excepcional, e o suporte técnico é sempre ágil e
              eficiente.
            </p>
          </div>
          <div class="card-testimonials__bottom">
            <img
              src="./assets/images/profile-woman.jpg"
              alt="Foto do Cliente"
              class="card-testimonials__profile" />
            <div class="card-testimonials__info">
              <p class="card-testimonials__name">Ana Ribeiro</p>
              <p class="card-testimonials__complement">Gerente de Loja</p>
            </div>
          </div>
        </div>
        <div class="card-testimonials">
          <div class="card-testimonials__top">
            <img
              src="./assets/images/customer-testimonial.svg"
              alt="Icone de Depoimento"
              class="card-testimonials__icon" />
            <p class="card-testimonials__text">
              Adquiri a interface de câmera e fiquei impressionado com a
              qualidade e a facilidade de uso. Agora dirijo com muito mais
              segurança.
            </p>
          </div>
          <div class="card-testimonials__bottom">
            <img
              src="./assets/images/profile-man.jpg"
              alt="Foto do Cliente"
              class="card-testimonials__profile" />
            <div class="card-testimonials__info">
              <p class="card-testimonials__name">Carlos Almeida</p>
              <p class="card-testimonials__complement">Interface de câmera</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sectionContact" id="contact">
    <div class="container">
      <h2 class="sectionContact__title">
        Estamos prontos para transformar sua experiência automotiva!
      </h2>
      <p class="sectionContact__text">
        Entre em contato com a ZZ2 e descubra como nossas soluções podem
        atender às suas necessidades, seja para sua empresa ou veículo
        pessoal. Nossa equipe especializada está à disposição para oferecer
        suporte e esclarecer todas as dúvidas.
      </p>
      <form action="index.php" method="POST" class="form" id="form">
        <div class="form__content">
          <h4 class="form__title">Envie sua mensagem</h4>
          <div class="form__group">
            <input
              type="text"
              class="form__input"
              placeholder="Como gostaria de ser chamado(a)?"
              id="formName"
              name="formName" />
            <span class="form__error">Aqui vai a mensagem de erro...</span>
          </div>
          <div class="form__group">
            <input
              type="email"
              class="form__input"
              placeholder="Digite o seu melhor e-mail..."
              id="formEmail"
              name="formEmail" />
            <span class="form__error">Aqui vai a mensagem de erro...</span>
          </div>
          <div class="form__group">
            <input
              type="tel"
              class="form__input"
              placeholder="Informe seu número para contato..."
              id="formPhone"
              name="formPhone" />
            <span class="form__error">Aqui vai a mensagem de erro...</span>
          </div>
          <div class="form__group">
            <textarea
              id="formMessage"
              class="form__textarea"
              placeholder="Digite sua mensagem..."
              name="formMessage"></textarea>
            <span class="form__error">Aqui vai a mensagem de erro...</span>
          </div>
          <button class="form__button button" type="submit" name="submit">
            Enviar sua mensagem
          </button>
        </div>
      </form>
    </div>
  </section>

  <?php require_once('footer.php') ?>

  <script src="./assets/scripts.js"></script>
</body>

</html>