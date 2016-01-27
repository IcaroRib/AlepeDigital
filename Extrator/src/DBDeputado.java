import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

public class DBDeputado {
	
	private java.sql.Connection conn;
	
	public ArrayList<Deputado> recuperarDeputados() throws SQLException, ClassNotFoundException{
		
		ArrayList<Deputado> listaDeputados = new ArrayList<Deputado>();
		conn = Connection.connect();
		String sql = "SELECT idDeputado,nomePolitico,url FROM deputado";
		Statement st = conn.createStatement();
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			Deputado aux = new Deputado();
			aux.setNomePolitico(rs.getString("nomePolitico"));
			aux.setUrl(rs.getString("url"));
			aux.setIdDeputado(rs.getInt("idDeputado"));
			listaDeputados.add(aux);
		}	
		conn.close();
		return listaDeputados;
		
	}
	
	public int procurarDeputado(String url) throws SQLException, ClassNotFoundException{
		
		conn = Connection.connect();
		String sql = "SELECT idDeputado FROM deputado WHERE url = '" + url + "'";
		Statement st = conn.createStatement();
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			int idDeputado = rs.getInt("idDeputado");
			conn.close();
			return idDeputado;
		}	
		conn.close();
		return 0;
		
	}
	
	public int procurarDeputado(Deputado deputado) throws SQLException{
		
		String sql = "SELECT idDeputado FROM deputado WHERE nomePolitico = '" + deputado.getNomePolitico() + "'";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			int idDeputado = rs.getInt("idDeputado");
			return idDeputado;
		}	
		
		return 0;
		
	}
	
	public int inserirDeputado (Deputado deputado) throws SQLException, ClassNotFoundException{
		
		conn = Connection.connect();
		
		int idDeputado = this.procurarDeputado(deputado);
		if(idDeputado != 0){
			return idDeputado;
		}
		
		int idPartido = this.inserirPartido(deputado.getPartido());		
		String sql = "INSERT INTO deputado (nomeCivil, nomePolitico, profissao, telefone, naturalidade, dataAniversario, descricao, url, idPartido) VALUES ('" 
					+ deputado.getNomeCivil() 
					+ "', '" + deputado.getNomePolitico()
					+ "', '" + deputado.getProfissão() 
					+ "', '" + deputado.getTelefone()
					+ "', '" + deputado.getNaturalidade()
					+ "', '" + deputado.getAniversário()
					+ "', '" + deputado.getDescrição()
					+ "', '" + deputado.getUrl()
					+ "', " + idPartido + ") ";		        	
		
		Statement st = conn.createStatement();
		System.out.println(sql);
		st.executeUpdate(sql);	
		ResultSet rs = st.getGeneratedKeys();
        if (rs.next()){
        	idDeputado = rs.getInt(1);
        }
        rs.close();
		conn.close();		
		return idDeputado;
	}
	
	public int procurarPartido(String sigla) throws SQLException{
		
		int idPartido = 0;		
		String sql = "SELECT idPartido from partido WHERE sigla = '" + sigla + "'";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idPartido = rs.getInt("idPartido");
			return idPartido;
		}		
		
		return idPartido;
		
	}
	
	public int inserirPartido (String sigla) throws SQLException, ClassNotFoundException{
		
		int idPartido = this.procurarPartido(sigla);
		if(idPartido != 0){
			return idPartido;
		}
		
		String sql = "INSERT INTO partido (sigla) VALUES ('" + sigla +"') ";
		Statement st = conn.createStatement();
		System.out.println(sql);
		st.executeUpdate(sql);	
		ResultSet rs = st.getGeneratedKeys();
        if (rs.next()){
        	idPartido = rs.getInt(1);
        }
        rs.close();
		return idPartido;
	}

}