import video from "../assets/johann-zarco.mp4"

export default function Login() {
  return (
    <main>
      <h1>Welcome Home Tarnished ;)</h1>
      <h2>
        Bon en soit j'aurai pu afficher des blogs ou n'importe quoi, mais il est
        trop tard du coup:
      </h2>
      <video width="100%" height="100%" loop autoPlay muted>
        <source src={video} type="video/mp4" />
      </video>
    </main>
  )
}
