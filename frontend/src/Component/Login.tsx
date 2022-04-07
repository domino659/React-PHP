import ReactReact, { useState } from "react"
import { Buffer } from "buffer"

export default function Login() {
  const [user, setUser] = useState("false")
  const [password, setPassword] = useState("false")

  const handleSubmit = () => {
    const credentials = Buffer.from(user + ":" + password).toString("base64")

    const headers = new Headers({
      "Authorization": `Basic ${credentials}`,
      "Content-Type": "application/x-www-form-urlencoded"
    })

    const data = new URLSearchParams({
      user: user
    })

    fetch("http://localhost:2345", {
      method: "POST",
      headers: headers,
      body: data,
      mode: "cors",
      credentials: "include"
    })
      .then(response => response.json())
      .then(dataPost => {
        console.log(dataPost)
      })
  }

  return (
    <div className="search-box">
      <form>
        <input
          type="text"
          className="search-bar"
          placeholder="Username"
          value={user}
          onChange={e => setUser(e.target.value)}
          required
        ></input>
        <input
          type="text"
          className="search-bar"
          placeholder="Password"
          value={password}
          onChange={e => setPassword(e.target.value)}
          required
        ></input>
        <input
          type="button"
          value="Envoyer"
          className="submitButton"
          onClick={handleSubmit}
        />
      </form>
    </div>
  )
}
