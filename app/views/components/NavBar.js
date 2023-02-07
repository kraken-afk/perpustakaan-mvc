class NavBar extends HTMLElement {
  css =
    `
  body {
    overflow-x: hidden;
  }

  .nav {
    width: 100%;
    height: 70px;
    background-color: #145af2;

    display: flex;
    align-items: center;
    padding-inline: 1rem;
    justify-content: space-between;

    position: sticky;
    top: 0;
    margin-bottom: 1rem;
  }

  .nav.active > .link-wrapper{
    right: 0;
  }

  .title {
    color: #fff;
    font-size: 1.8rem;
  }

  .link-wrapper {
    display: flex;
    flex-direction: column;
    gap: 1rem;

    background-color: #145af2;

    position: absolute;
    top: 70px;
    right: -100%;

    padding-inline: 1rem;
    padding-block: 1rem;

    height: 99vh;
    width: 80%;
    max-width: 300px;
    transition-duration: .4s;
    transition-timing-function: ease-in-out;
  }

  .link-item {
    color: #fff;
    text-decoration: none;
    padding-block: 6px;
    padding-inline:  8px;
    border-radius: 6px;
    background-color: transparent;
    transition: .2s;
  }

  .link-item:hover {
    background-color: #2654b6;
  }

  .hamburger-btn {
    width: 40px;
    height: 40px;
    padding-inline: 5px;
    padding-block: 5px;

    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: end;

    border: none;
    border-radius: 4px;
    background-color: transparent;
    cursor: pointer;
    z-index: 10;
  }

  .hamburger-btn > div {
    border-radius: 6px;
    pointer-events: none;
    transition: .2s;
  }

  .hamburger-btn > div:first-child {
    width: 100%;
    height: 3px;
    background-color: #fff;
  }

  .hamburger-btn > div:last-child {
    width: 60%;
    height: 3px;
    background-color: #fff;
  }

  .nav.active > .hamburger-btn {
    background-color: #2654b6;
  }

  .nav.active > .hamburger-btn > div:last-child {
    width: 100%;
  }
  `;

  connectedCallback() {
    this.render();
    document.getElementById('hamburger-btn').onclick = this.clickHandler;
  }

  render() {
    const styleTag = document.createElement('style');

    styleTag.innerHTML = this.css.replace(/\s/mgi, '');
    document.head.appendChild(styleTag);

    this.innerHTML =
      `
      <nav class="nav">
      <span class="title">Perpustakaan</span>
      <button class="hamburger-btn" id="hamburger-btn">
        <div></div>
        <div></div>
      </button>
      <div class="link-wrapper">
        <a href="/" class="link-item">Home</a>
        <a href="/author" class="link-item">Author</a>
        <a href="/books" class="link-item">Books</a>
        <a href="/pinjaman" class="link-item">Pinjaman</a>
        <a href="/report" class="link-item">Report</a>
        <a href="/user" class="link-item">User</a>
        <a href="/return" class="link-item">Return</a>
        <a href="/logout" class="link-item">Logout</a>
      </div>
    </nav>
    `;
  }

  clickHandler({ target }) {
    if (target.parentElement.classList.contains('active'))
      target.parentElement.classList.remove('active');
    else
      target.parentElement.classList.add('active');
  }
}

customElements.define('nav-bar', NavBar);
