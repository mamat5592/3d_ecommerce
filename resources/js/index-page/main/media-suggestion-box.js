import { Link } from "react-router-dom";

function MSB(props) {
    return (
        <section className="border rounded py-3 mb-5">
            <div className="px-2 mb-3">
                <h2>{props.title}</h2>
            </div>

            <div className="row mb-3">
                <div className="col-12 col-lg-4">
                    <img
                        src={props.image_1}
                        alt="logo"
                    />
                </div>
                <div className="col-12 col-lg-4">
                    <img
                        src={props.image_2}
                        alt="logo"
                    />
                </div>
                <div className="col-12 col-lg-4">
                    <img
                        src={props.image_3}
                        alt="logo"
                    />
                </div>
            </div>

            <div className="px-2">
                <Link to={props.link}>see more</Link>
            </div>
        </section>
    );
}

export default MSB;
