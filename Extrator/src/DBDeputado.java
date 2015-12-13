import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class DBDeputado {
	
	private java.sql.Connection conn;
	
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
		String sql = "INSERT INTO deputado (nomeCivil, nomePolitico, profissao, telefone, naturalidade, dataAniversario, descricao,idPartido) VALUES ('" 
					+ deputado.getNomeCivil() 
					+ "', '" + deputado.getNomePolitico()
					+ "', '" + deputado.getProfissão() 
					+ "', '" + deputado.getTelefone()
					+ "', '" + deputado.getNaturalidade()
					+ "', '" + deputado.getAniversário()
					+ "', '" + deputado.getDescrição()
					+ "', " + idPartido + ") ";		        	
		
		Statement st = conn.createStatement();
		System.out.println(sql);
		idDeputado = st.executeUpdate(sql,1);
		
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
			idPartido = rs.getInt("idDeputado");
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
		idPartido = st.executeUpdate(sql, 1);	
		return idPartido;
	}

}