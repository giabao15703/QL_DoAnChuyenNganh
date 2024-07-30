<style>
    .active {
        color: #2563EB;
        border-bottom: 2px solid #2563EB;
    }

    @import "https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,400";

    /* colors */
    /* tab setting */
    /* breakpoints */
    /* selectors relative to radio inputs */
    html {
        width: 100%;
        height: 100%;
    }

    body {
        background: #efefef;
        color: #333;
        font-family: "Raleway";
        height: 100%;
    }

    #myChart {
        width: 100% !important;
        height: auto !important;
    }


    .tabs {
        left: 50%;
        transform: translateX(-50%);
        position: relative;
        background: white;
        border-radius: 5px;
        min-width: 240px;
    }

    .tabs input[name=tab-control] {
        display: none;
    }

    .tabs .content section h2,
    .tabs ul li label {
        font-family: "Montserrat";
        font-weight: bold;
        font-size: 18px;
        color: #428bff;
    }

    .tabs ul {
        list-style-type: none;
        padding-left: 0;
        display: flex;
        flex-direction: row;
        margin-bottom: 10px;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
    }

    .tabs ul li {
        box-sizing: border-box;
        flex: 1;
        width: 25%;
        padding: 0 10px;
        text-align: center;
    }

    .tabs ul li label {
        transition: all 0.3s ease-in-out;
        color: #929daf;
        padding: 5px auto;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        white-space: nowrap;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .tabs ul li label br {
        display: none;
    }

    .tabs ul li label svg {
        fill: #929daf;
        height: 1.2em;
        vertical-align: bottom;
        margin-right: 0.2em;
        transition: all 0.2s ease-in-out;
    }

    .tabs ul li label:hover,
    .tabs ul li label:focus,
    .tabs ul li label:active {
        outline: 0;
        color: #bec5cf;
    }

    .tabs ul li label:hover svg,
    .tabs ul li label:focus svg,
    .tabs ul li label:active svg {
        fill: #bec5cf;
    }

    .tabs .slider {
        position: relative;
        width: calc(100% / var(--slide));
        transition: all 0.33s cubic-bezier(0.38, 0.8, 0.32, 1.07);
    }

    .tabs .slider .indicator {
        position: relative;
        width: 100%;
        max-width: 100%;
        margin: 0 auto;
        height: 4px;
        background: #428bff;
        border-radius: 100vh;
    }

    .tabs .content {
        margin-top: 10px;
    }

    .tabs .content section {
        display: none;
        animation-name: content;
        animation-direction: normal;
        animation-duration: 0.3s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: 1;
        line-height: 1.4;
    }

    .tabs .content section h2 {
        color: #428bff;
        display: none;
    }

    .tabs .content section h2::after {
        content: "";
        position: relative;
        display: block;
        width: 30px;
        height: 3px;
        background: #428bff;
        margin-top: 5px;
        left: 1px;
    }

    .tabs input[name=tab-control]:nth-of-type(1):checked~ul>li:nth-child(1)>label {
        cursor: default;
        color: #428bff;
    }

    .tabs input[name=tab-control]:nth-of-type(1):checked~ul>li:nth-child(1)>label svg {
        fill: #428bff;
    }

    @media (max-width: 600px) {
        .tabs input[name=tab-control]:nth-of-type(1):checked~ul>li:nth-child(1)>label {
            background: rgba(0, 0, 0, 0.08);
        }
    }

    .tabs input[name=tab-control]:nth-of-type(1):checked~.slider {
        transform: translateX(0%);
    }

    .tabs input[name=tab-control]:nth-of-type(1):checked~.content>section:nth-child(1) {
        display: block;
    }

    .tabs input[name=tab-control]:nth-of-type(2):checked~ul>li:nth-child(2)>label {
        cursor: default;
        color: #428bff;
    }

    .tabs input[name=tab-control]:nth-of-type(2):checked~ul>li:nth-child(2)>label svg {
        fill: #428bff;
    }

    @media (max-width: 600px) {
        .tabs input[name=tab-control]:nth-of-type(2):checked~ul>li:nth-child(2)>label {
            background: rgba(0, 0, 0, 0.08);
        }
    }

    .tabs input[name=tab-control]:nth-of-type(2):checked~.slider {
        transform: translateX(100%);
    }

    .tabs input[name=tab-control]:nth-of-type(2):checked~.content>section:nth-child(2) {
        display: block;
    }

    .tabs input[name=tab-control]:nth-of-type(3):checked~ul>li:nth-child(3)>label {
        cursor: default;
        color: #428bff;
    }

    .tabs input[name=tab-control]:nth-of-type(3):checked~ul>li:nth-child(3)>label svg {
        fill: #428bff;
    }

    @media (max-width: 600px) {
        .tabs input[name=tab-control]:nth-of-type(3):checked~ul>li:nth-child(3)>label {
            background: rgba(0, 0, 0, 0.08);
        }
    }

    .tabs input[name=tab-control]:nth-of-type(3):checked~.slider {
        transform: translateX(200%);
    }

    .tabs input[name=tab-control]:nth-of-type(3):checked~.content>section:nth-child(3) {
        display: block;
    }

    .tabs input[name=tab-control]:nth-of-type(4):checked~ul>li:nth-child(4)>label {
        cursor: default;
        color: #428bff;
    }

    .tabs input[name=tab-control]:nth-of-type(4):checked~ul>li:nth-child(4)>label svg {
        fill: #428bff;
    }

    @media (max-width: 600px) {
        .tabs input[name=tab-control]:nth-of-type(4):checked~ul>li:nth-child(4)>label {
            background: rgba(0, 0, 0, 0.08);
        }
    }

    .tabs input[name=tab-control]:nth-of-type(4):checked~.slider {
        transform: translateX(300%);
    }

    .tabs input[name=tab-control]:nth-of-type(4):checked~.content>section:nth-child(4) {
        display: block;
    }

    @keyframes content {
        from {
            opacity: 0;
            transform: translateY(5%);
        }

        to {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    @media (max-width: 1000px) {
        .tabs ul li label {
            white-space: initial;
        }

        .tabs ul li label br {
            display: initial;
        }

        .tabs ul li label svg {
            height: 1.5em;
        }
    }

    @media (max-width: 600px) {
        .tabs ul li label {
            padding: 5px;
            border-radius: 5px;
        }

        .tabs ul li label span {
            display: none;
        }

        .tabs .slider {
            display: none;
        }

        .tabs .content {
            margin-top: 20px;
        }

        .tabs .content section h2 {
            display: block;
        }
    }
</style>