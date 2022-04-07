import ReactReact, { useState } from "react"
import { Buffer } from "buffer"

export default function Login() {
  const [username, setUsername] = useState("")
  const [password, setPassword] = useState("")

  const handleSubmit = () => {
    const credentials = Buffer.from(username + ":" + password).toString(
      "base64"
    )

    const headers = new Headers({
      "Authorization": `Basic ${credentials}`,
      "Content-type": "application/x-www-form-urlencoded"
    })

    const data = new URLSearchParams({
      user: username
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
      .catch(error => console.log("Authorization failed : " + error.message))
  }

  return (
    <div className="search-box">
      <form>
        <input
          type="text"
          className="search-bar"
          placeholder="Username"
          value={username}
          onChange={e => setUsername(e.target.value)}
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
