<?php
include('./include/header.php');
include 'carrito.php';
?>

<!-- slider section -->
<section class="slider_section">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box text-over-image carousel-text-background">
                <h1>Accesorios de calidad</h1>
                <p>Bienvenido a la página oficial de Dollpins, donde podrás explorar un amplio catálogo de accesorios para completar tu estilo. Nuestro objetivo es ofrecerte las últimas tendencias en moda y calidad, para que siempre te sientas y te veas increíble.</p>
                <div class="btn-box">
                  <a href="#productos" class="btn1">Pide Ahora</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end slider section -->
</div>

<!-- products section -->
<section class="food_section layout_padding-bottom" id="productos">
  <div class="container">
    <div class="heading_container heading_center">
      <br>
      <h2>
        Catalogo
      </h2>
    </div>

    <ul class="filters_menu">
      <li class="active" data-filter="*">Todos</li>
      <li data-filter=".pines">Pines</li>
      <li data-filter=".botones">Botones</li>
      <li data-filter=".pasta">Papeleria</li>
      <li data-filter=".accesorios">Accesorios</li>
    </ul>

    <?php if ($mensaje != "") { ?>
      <div class="alert alert-success">
        <?php echo $mensaje; ?>
      </div>
    <?php } ?>

    <div class="filters-content">
      <div class="row grid">
        <div class="col-sm-6 col-lg-4 all pines">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/pin1.png" alt="Pin Gato Diabólico">
              </div>
              <div class="detail-box">
                <h5>
                  Pin gato diabolico
                </h5>
                <p>
                  Este intrigante pin presenta a un gato diabólico de color morado, diseñado para aquellos que buscan añadir un toque oscuro y lindo a su colección.</p>
                <div class="options">
                  <h6>
                    $12.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="1" name="id">
                    <input type="hidden" value="Pin gato diabolico" name="nombre">
                    <input type="hidden" value="12000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all pines">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/pin2.png" alt="Pin Bob Esponja">
              </div>
              <div class="detail-box">
                <h5>
                  Pin Bob Esponja
                </h5>
                <p>
                  Este encantador pin de Bob Esponja captura la esencia divertida y colorida del personaje favorito de todos. Bob Esponja, el alegre y optimista habitante de Fondo de Bikini.
                </p>
                <div class="options">
                  <h6>
                    $15.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="2" name="id">
                    <input type="hidden" value="Pin Bob Esponja" name="nombre">
                    <input type="hidden" value="15000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all accesorios">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/parche1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Parche Pepe La Rana
                </h5>
                <p>
                  Confeccionado en tela duradera y bordado con hilos de alta calidad, captura los detalles y colores distintivos de Pepe.</p>
                <div class="options">
                  <h6>
                    $17.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="3" name="id">
                    <input type="hidden" value="Parche Pepe La Rana" name="nombre">
                    <input type="hidden" value="17000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all pines">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/pin4.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pin Frank Ocean
                </h5>
                <p>
                  Este pin de Frank Ocean del álbum "Blond" es un tributo a la obra maestra musical que cautivó a fans de todo el mundo. Con un diseño cuidadosamente detallado que captura la esencia del álbum, este pin es un símbolo de aprecio por la creatividad y la profundidad de Frank Ocean. </p>
                <div class="options">
                  <h6>
                    $18.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="4" name="id">
                    <input type="hidden" value="Pin Frank Ocean" name="nombre">
                    <input type="hidden" value="18000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all botones">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/boton1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Boton Spider-Man
                </h5>
                <p>
                  Este hermoso botón de nuestro querido vecino arácnido presenta a Spider-Man en todo su esplendor. Los colores nítidos y brillantes resaltan sobre el plástico de alta calidad. Ideal para mochilas, chaquetas o cualquier prenda </p>
                <div class="options">
                  <h6>
                    $10.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="5" name="id">
                    <input type="hidden" value="Boton Spider-Man" name="nombre">
                    <input type="hidden" value="10000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all pines">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/pin3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pin Majoras Mask - Zelda
                </h5>
                <p>
                  Este impresionante pin de Majora's Mask de The Legend of Zelda captura la esencia misteriosa y fascinante del icónico artefacto. Con colores nítidos y brillantes sobre metal de alta calidad </p>
                <div class="options">
                  <h6>
                    $15.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="6" name="id">
                    <input type="hidden" value="Pin Majoras Mask - Zelda" name="nombre">
                    <input type="hidden" value="15000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all accesorios">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/aretes1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Aretes De Gato
                </h5>
                <p>
                  Estos elegantes aretes presentan encantadores gatos negros con detalles de época victoriana. Finamente elaborados, los gatos están adornados con delicados encajes y filigranas que evocan la sofisticación del estilo victoriano. </p>
                <div class="options">
                  <h6>
                    $12.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="7" name="id">
                    <input type="hidden" value="Aretes De Gato" name="nombre">
                    <input type="hidden" value="12000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all accesorios">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/aretes2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Aretes De Corazon
                </h5>
                <p>
                  Estos elegantes aretes de corazón con estilo neo combinan un diseño contemporáneo con un toque sofisticado. Los corazones están finamente elaborados, destacándose con líneas limpias y una forma moderna. </p>
                <div class="options">
                  <h6>
                    $14.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="8" name="id">
                    <input type="hidden" value="Aretes De Corazon" name="nombre">
                    <input type="hidden" value="14000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-4 all accesorios">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/gargantilla1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Gargantilla coquette
                </h5>
                <p>
                  Esta encantadora gargantilla coquette presenta un diseño delicado y romántico, perfecto para añadir un toque de elegancia femenina a cualquier atuendo. La pieza central destaca por sus detalles finamente elaborados y su sutil brillo. </p>
                <div class="options">
                  <h6>
                    $10.000
                  </h6>
                  <form action="" method="post">
                    <input type="hidden" value="9" name="id">
                    <input type="hidden" value="Gargantilla coquette" name="nombre">
                    <input type="hidden" value="10000" name="precio">
                    <div class="input-group mb-2">
                      <h6>Cantidad:</h6>
                      <input type="number" class="form-control ml-3" value="0" style="width: 30px;" name="cantidad">
                    </div>
                    <button class="btn btn-success" name="btnAccion" value="Agregar" type="submit">Agregar al Carrito</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end products section -->

<!-- about section -->
<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="images/about.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              Nosotros somos Dollpins
            </h2>
          </div>
          <p>
            Nuestra misión es ofrecer accesorios únicos que permitan a nuestros
            clientes expresar su personalidad, estilo y pasiones de una manera auténtica y
            creativa. Nos comprometemos a proporcionar productos de calidad excepcional,
            servicio al cliente excepcional y una experiencia de compra excepcional en cada punto
            de contacto.
            Nos esforzamos por inspirar la confianza y la lealtad de nuestros clientes, y por
            contribuir positivamente a la comunidad a través de prácticas comerciales éticas y
            sostenibles.
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- book section -->
<!-- end book section -->

<?php include('./include/footer.php'); ?>