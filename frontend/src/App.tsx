import "./css/index.css"
import Home from "./Component/Home"
import Login from "./Component/Login"
import { useEffect, useState } from "react"

export default function App() {
  const [logged, setlogged] = useState("false")

  useEffect(() => {
    const body = new URLSearchParams({
      action: "checkToken",
      token: document.cookie
    })

    fetch("http://localhost:2345", {
      method: "POST",
      body: body,
      mode: "cors"
    })
      .then(response => response.json())
      .then(data => {
        console.log(data)
        setlogged(data.statue)
      })
      .catch(error =>
        console.log("Token Authorization failed : " + error.message)
      )
  }, [])

  function Log(props: any) {
    const isLoggedIn = props.isLoggedIn
    if (isLoggedIn) {
      return <Home />
    }
    return <Login />
  }

  return (
    <main>
      <Log isLoggedIn={logged} />
    </main>
  )
}
