import { useEffect } from "react"
import './App.css'; 

export default function App() {
  useEffect( () => {
    const body = new URLSearchParams({
      username: 'Domino',
      password: 'password'
    });

    const headers = new Headers({
      'Content-Type': 'application/x-www-form-urlencoded',
      'authorization': `Basic ${btoa("banana")}`
    })

    fetch( 'http://localhost:2345', {
      method: 'POST',
      body: body,
      headers: headers,
      mode: 'cors',
      credentials: 'include'
    })
      .then(res => res.json())
      .then(data => console.log(data))
  },  [])

  return (
    <main>
      <div className="search-box">
        <form action="">
          <input
            type="text"
            className="search-bar"
            placeholder="Username"
            // value={query}
            // onKeyPress={search}
          ></input>
          <input
            type="text"
            className="search-bar"
            placeholder="Password"
            // value={query}
            // onKeyPress={search}
          ></input>
          <input type="submit" className="submit" />
        </form>
        </div>
    </main>
  )
}
