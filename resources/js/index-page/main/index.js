import MSB from "./media-suggestion-box";
import TSB from "./text-suggestion-box";
import image_11 from "./images/curioso-photography-xYrTdhysQY0-unsplash.jpg";
import image_12 from "./images/jason-sung-d88x_DEv8Zc-unsplash.jpg";
import image_13 from "./images/neonbrand-38XhGPwzI3U-unsplash.jpg";
import image_21 from "./images/jacob-jensen-otKYK0h-5tE-unsplash.jpg";
import image_22 from "./images/oriento-8OGW6pCVRc4-unsplash.jpg";
import image_23 from "./images/dinu-j-nair-M6h35oR57Xs-unsplash.jpg";
import image_31 from "./images/roman-synkevych-UT8LMo-wlyk-unsplash.jpg";
import image_32 from "./images/shubham-dhage-R5A_YlcSJwA-unsplash.jpg";
import image_33 from "./images/fakurian-design-CdAmQAko9As-unsplash.jpg";

function Main() {
    return (
        <main className="container-fluid justify-content-center">
            <div className="container py-5">
                <div className="py-3 px-2 mb-5">
                    <p className="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Repellendus optio soluta exercitationem deleniti,
                        pariatur laborum a maxime harum ipsum corporis, tempore
                        quos quia alias rerum dolore, beatae expedita sapiente
                        vel? Nisi expedita quis repudiandae voluptate ratione
                        pariatur mollitia corporis corrupti minima quia ex rerum
                        nesciunt placeat aliquam perspiciatis, nobis adipisci
                        sapiente assumenda excepturi ipsum nihil iste
                        reprehenderit! Eos, voluptate ad! Eius obcaecati itaque
                        iste, aliquam voluptates quas esse error sunt reiciendis
                        nihil odio ipsam maiores nesciunt id aperiam maxime
                        praesentium sequi tempore quo? Sint dolore enim
                        repudiandae voluptatum corporis corrupti. Aut odio quo,
                        soluta itaque sint nesciunt maiores magnam commodi
                        exercitationem expedita, id dignissimos. Beatae optio
                        quas voluptate dolorem officia nulla ut vitae voluptas
                        deleniti error, quae tenetur ipsam adipisci? Excepturi
                        voluptates laboriosam sequi vitae dolore voluptate
                        quibusdam, in laborum enim necessitatibus odit est aut
                        exercitationem fugit quasi illum doloremque corporis
                        repellat inventore sint. Harum aut reiciendis dolor
                        blanditiis ipsum. Accusantium laborum sed at molestiae
                        placeat consequuntur non, labore doloribus omnis
                        possimus. Reprehenderit, inventore et distinctio minima
                        facilis adipisci, deserunt libero blanditiis iure
                        dolorem dolores ipsum quas tempora, quisquam in. Vel a
                        ipsam cum. Reprehenderit, dolor ducimus ab fuga
                        molestiae excepturi corrupti provident nemo ipsum
                        labore, dolores, deserunt facere ea doloremque. Adipisci
                        minima recusandae architecto, ea provident cupiditate id
                        facere! Libero debitis mollitia voluptatum nesciunt
                        similique sit nulla quaerat praesentium blanditiis sunt.
                        Doloribus totam laborum, facilis deserunt atque
                        inventore commodi quibusdam labore, repudiandae
                        perferendis perspiciatis animi sit eius distinctio
                        exercitationem?
                    </p>
                </div>

                <MSB
                    title="Most popular Models"
                    image_1={image_11}
                    image_2={image_12}
                    image_3={image_13}
                    link="api/most-popular"
                />

                <MSB
                    title="Newest Models"
                    image_1={image_21}
                    image_2={image_22}
                    image_3={image_23}
                    link="api/newest"
                />

                <MSB
                    title="Free Models"
                    image_1={image_31}
                    image_2={image_32}
                    image_3={image_33}
                    link="api/free"
                />

                <TSB
                    title="Categories"
                    text_title_1="Lorem ipsum dolor sit amet"
                    text_1="Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi impedit ipsam quaerat qui dolorem veniam iusto, sit
                        labore in, tempore, deserunt blanditiis adipisci
                        provident hic quisquam. Distinctio nostrum fugiat amet?"
                    text_title_2="Lorem ipsum dolor sit amet"
                    text_2="Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi impedit ipsam quaerat qui dolorem veniam iusto, sit
                        labore in, tempore, deserunt blanditiis adipisci
                        provident hic quisquam. Distinctio nostrum fugiat amet?"
                    text_title_3="Lorem ipsum dolor sit amet"
                    text_3="Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Modi impedit ipsam quaerat qui dolorem veniam iusto, sit
                        labore in, tempore, deserunt blanditiis adipisci
                        provident hic quisquam. Distinctio nostrum fugiat amet?"
                    link="api/categories"
                />
            </div>
        </main>
    );
}

export default Main;
