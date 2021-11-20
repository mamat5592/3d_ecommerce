function SB(props) {
    return (
        <div className="d-block mb-2">
            <a className="text-light" href={props.link}>
                <i className={props.spec_class} id={props.spec_id}></i>
                {props.social_id}
            </a>
        </div>
    );
}

export default SB;
