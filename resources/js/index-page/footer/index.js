import "./index.css";
import e_namad from "./images/e-nemad3-1.jpg";
import SB from "./social-box";

function Footer() {
    return (
        <footer className="bg-secondary container-fluid justify-content-center">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12 col-lg-4 mb-5" id="description">
                        <p className="text-light text-justify">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Modi impedit ipsam quaerat qui dolorem veniam
                            iusto, sit labore in, tempore, deserunt blanditiis
                            adipisci provident hic quisquam. Distinctio nostrum
                            fugiat amet?tempore, deserunt blanditiis adipisci
                            provident hic quisquam. Distinctio nostrum fugiat
                            amet?
                        </p>
                    </div>

                    <div className="col-12 col-lg-4 mb-5" id="e-namad">
                        <img src={e_namad} alt="logo" />
                    </div>

                    <div className="col-12 col-lg-4" id="social-networks">
                        <SB
                            link="https://www.instagram.com/spirit.mamat/"
                            spec_class="fab fa-instagram pr-2"
                            spec_id="instagram-social"
                            social_id="spirit.mamat"
                        />

                        <SB
                            link="https://t.me/benshaste"
                            spec_class="fab fa-telegram pr-2"
                            spec_id="telegram-social"
                            social_id="@benshaste"
                        />

                        <SB
                            link="https://discordapp.com/users/667279681271103507/"
                            spec_class="fab fa-discord pr-2"
                            spec_id="discord-social"
                            social_id="SPIRITS.pain#9864"
                        />

                        <SB
                            link="https://wa.me/+989223474291"
                            spec_class="fab fa-whatsapp pr-2"
                            spec_id="whatsapp-social"
                            social_id="+98-922-347-4291"
                        />
                    </div>
                </div>
            </div>
        </footer>
    );
}

export default Footer;
