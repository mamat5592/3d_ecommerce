import { useState } from "react";
import { Link } from "react-router-dom";

import "./index.css";
import logo from "./images/logo.png";

function Header() {
    const [toggleBtn, setToggleBtn] = useState("btn-info fas fa-bars");
    const [menuVisibility, setMenuVisibility] = useState("none");

    function toggleMenu() {
        setMenuVisibility(menuVisibility === "none" ? "d-flex" : "none");
        setToggleBtn(menuVisibility === "none" ? "btn-danger fas fa-times" : "btn-info fas fa-bars");
    }

    return (
        <header className="container-fluid justify-content-center">
            <div className="container-fluid" id="banner">
                <div className="container">
                    <div
                        className="row justify-content-between"
                        id="top-header"
                    >
                        <div className="col-6 col-sm-5 col-md-4 col-lg-3">
                            <img src={logo} alt="logo" />
                        </div>
                        <div className="col-5 col-sm-2 col-lg-2" id="account">
                            <Link className="text-light pr-2" to="login">
                                login
                            </Link>
                            <Link className="text-light" to="register">
                                register
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <div className="container-fluid bg-secondary" id="bottom-header">
                <nav className="container" id="navbar">
                    <ul className="row justify-content-center justify-content-lg-between align-items-center">
                        <li
                            className={`menu col-lg-1 justify-content-center align-items-center ${menuVisibility}`}
                        >
                            <Link className="text-light" to="/">
                                Home
                            </Link>
                        </li>
                        <li
                            className={`menu col-lg-1 justify-content-center align-items-center ${menuVisibility}`}
                        >
                            <Link className="text-light" to="api/v1/3d-models">
                                3D Models
                            </Link>
                        </li>
                        <li
                            className={`menu col-lg-1 justify-content-center align-items-center ${menuVisibility}`}
                        >
                            <Link className="text-light" to="api/v1/categories">
                                Categories
                            </Link>
                        </li>
                        <li
                            className={`menu col-lg-1 justify-content-center align-items-center ${menuVisibility}`}
                        >
                            <Link className="text-light" to="api/v1/about-us">
                                About Us
                            </Link>
                        </li>
                        <li
                            className={`menu col-lg-1 justify-content-center align-items-center ${menuVisibility}`}
                        >
                            <Link className="text-light" to="api/v1/contact-us">
                                Contact Us
                            </Link>
                        </li>

                        <li className="col-10 col-lg-5">
                            <div className="row">
                                <input
                                    className="col-8 col-lg-10 form-control"
                                    type="text"
                                />
                                <button
                                    className="col-2 col-lg-2 btn btn-primary fas fa-search"
                                    type="submit"
                                ></button>
                                <button
                                    className={`col-2 btn-info fas fa-bars ${toggleBtn}`}
                                    id="toggle-icon"
                                    onClick={toggleMenu}
                                ></button>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    );
}

export default Header;
