<?php
  require_once 'Component/layouts/header.php';
?>
    <style type="text/css">
      .content{
            width: 100%;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 auto;
            margin-bottom: 30px;
      }
      .faq-wrap {
          position: relative;
          width: 310px;
          height: 214px;
      }
      .faq-item {
          width: 100%;
          height: 100%;
          display: -webkit-box;
          display: -webkit-flex;
          display: flex;
          -webkit-box-align: center;
          -webkit-align-items: center;
          align-items: center;
          -webkit-box-pack: center;
          -webkit-justify-content: center;
          justify-content: center;
          background: #fff;
          box-shadow: 0 0 10px 2px rgb(217 220 221 / 50%);
          border-radius: 4px;
          border: 2px solid #bcbcbc;
      }
      .wrap {
              text-align: center;
      }
      .desp {
          font-size: 18px;
          font-weight: 700;
          color: #222;
          line-height: 25px;
          margin-top: 15px;
      }
      .gap {
        margin-top: 25px;
      }

      .hover-wrap {
          display: none;
      }

      .faq-item:hover + .hover-wrap{
        display: block;
/*        background: #e5e5e5;*/
      }
      .hover-wrap1{
          position: relative;
          z-index: 100;
          width: 350px;
          height: 244px;
          top: -15px;
          left: -20px;
          background: #fff;
          box-shadow: 0 4px 17px 4px rgb(196 196 196 / 80%);
          border-radius: 2px;
          border: 3px solid #e5e5e5;
          padding: 20px;
      }

      .title {
          font-size: 18px;
          /*color: #fff;*/
          margin-bottom: 15px;
          text-transform: capitalize;
          text-align: left;
          font-weight: bold;
      }
      .hover_bottom {
          font-size: 12px;
          font-weight: 400;
          color: #fff;
          color: blue;
      }
      .question {
            font-size: 12px;
            margin-bottom: 12px;
      }

    </style>
  
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-12" style="padding:40px;">
                <div class="aa-blog-content" style="margin-left: 70px;margin-right: 70px;">
                  <div class="row"  >
                  <div class="content">
                  <div class="faq-wrap j-faq-wrap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/15773447793cc857c024708812c9b2659aae96f2d1.png"> <div class="desp">Vấn đề về đơn hàng</div>
                      </div>
                    </div> 
                    <div class="hover-wrap">
                      <div class="hover-wrap1">
                      <div tabindex="0" class="title">Vấn đề về đơn hàng</div> 
                      <a href="" class="question">Tôi có thể hủy đơn hàng không?</a><br/>
                      <a href="" class="question">Tại sao tôi không nhận được email về đơn hàng của mình được chuyển đi?</a><br/>
                      <a href="" class="question">Tại sao tôi không nhận được email xác nhận về đơn hàng của mình?</a> <br/>
                      <div class="hover_bottom"><span>Xem thêm</span></div>
                      </div>
                    </div>
                  </div>

                  <div class="faq-wrap j-faq-wrap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/1577344792eaab69403a3c4927db7f59ee413dc1ad.png"> <div class="desp">Vận chuyển</div></div>
                    </div> 
                      <div class="hover-wrap">
                        <div class="hover-wrap1">
                        <div tabindex="0" class="title">Vận chuyển</div> 
                        <a href="" class="question">Đơn hàng của tôi ở đâu?</a><br/>
                        <a href="" class="question">Bạn có giảm bớt phí vận chuyển hay không?</a><br/>
                        <a href="" class="question"> Gói sẽ mất bao lâu để đến đích?</a> <br/>
                        <div class="hover_bottom"><span>Xem thêm</span></div>
                      </div>
                    </div>
                  </div>

                  <div class="faq-wrap j-faq-wrap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/1577344815231ded157ce5e24a8f460f0fdbb70104.png"> 
                        <div class="desp">Trả hàng &amp; Hoàn tiền
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="faq-wrap j-faq-wrap gap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/15773448250984cf91efc151a67aad3e2be9dbb5ae.png"> 
                        <div class="desp">Thanh toán &amp; Khuyến mãi
                        </div>
                      </div>
                    </div> 
                  </div>
                  <div class="faq-wrap j-faq-wrap gap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/1577344849f82b313896a2f997d78e77f6c1601c64.png"> <div class="desp">Sản phẩm &amp; Kho hàng</div>
                      </div>
                    </div> 
                  </div>
                  <div class="faq-wrap j-faq-wrap gap">
                    <div tabindex="0" class="faq-item" style="">
                      <div class="wrap">
                        <img src="http://img.shein.com/images3/2019/12/26/1577344857b997d452afb4cef4939b20aae2f1b443.png"> 
                        <div class="desp">Tài khoản</div>
                      </div>
                    </div> 
                  </div>

                </div>
                </div>
              </div>
            </div>
          </div>

           <div class="aa-contact-top">
             <h2>Chúng tôi đang chờ đợi để hỗ trợ bạn</h2>
             <p>Hãy để lại những câu hỏi của bạn vào dưới đây, chúng tôi sẽ trả lời lại bạn trong thời gian sớm nhất.</p>
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1056558874584!2d108.21056531466331!3d16.06000614395137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219b5e8fc2767%3A0x355c74ec67255daa!2zMTI1IE5ndXnhu4VuIFbEg24gTGluaCwgVsSpbmggVHJ1bmcsIFEuIFRoYW5oIEtow6osIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1621243211658!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen loading="lazy">
              </iframe>

              <!-- <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Tên của bạn" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" placeholder="Email" class="form-control">
                        </div>
                      </div>
                    </div>                
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" placeholder="Nội dung"></textarea>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>SerriShop</h4>
                     <p></p>
                     <p><span class="fa fa-home"></span>125 Nguyễn Văn Linh, Đà Nẵng</p>
                     <p><span class="fa fa-phone"></span>0776555522</p>
                     <p><span class="fa fa-envelope"></span>Email: serri@gmail.com</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php 
    require_once 'Component/layouts/Subscribe.php';
    require_once 'Component/layouts/footer.php'; 
?>
   