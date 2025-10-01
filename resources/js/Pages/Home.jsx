import Layout from './Layout'


function Home({ message }) {
    return (
        <div className="min-h-screen bg-gradient-to-r from-indigo-500 to-purple-600 flex flex-col items-center justify-center text-white">
            <h1 className="text-4xl font-bold mb-4">Bem-vindo a Home Page</h1>
            <p className="text-lg mb-6">Esta é a home page estilizada com Tailwind CSS.</p>
            <p>{message}</p>
            <button className="bg-white text-indigo-600 font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-gray-200 transition">
                Saiba Mais
            </button>
        </div>
    )
}

Home.layout = page => <Layout children={page} title="Dashboard" />

export default Home