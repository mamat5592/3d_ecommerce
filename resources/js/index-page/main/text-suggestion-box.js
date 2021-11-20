import { Link } from "react-router-dom";

function TSB(props) {
    return (
        <section className="border rounded py-3 px-2 mb-5">
            <div className="text-box-header">
                <h2>{props.title}</h2>
            </div>

            <div className="row mb-3 text-justify">
                <div className="col-12 col-lg-4">
                    <h3>{props.text_title_1}</h3>
                    <p>{props.text_1}</p>
                </div>

                <div className="col-12 col-lg-4">
                    <h3>{props.text_title_2}</h3>
                    <p>{props.text_2}</p>
                </div>

                <div className="col-12 col-lg-4">
                    <h3>{props.text_title_3}</h3>
                    <p>{props.text_3}</p>
                </div>
            </div>

            <div>
                <Link to={props.link}>see all</Link>
            </div>
        </section>
    );
}

export default TSB;
