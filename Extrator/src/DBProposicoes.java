import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;


public class DBProposicoes {
	
private java.sql.Connection conn;
	
	public int procurarProposicao(Proposicao proposicao) throws SQLException{
		
		int idProposicao = 0;		
		String sql = "SELECT idProposicao FROM proposicao WHERE numeroProposicao = '" + proposicao.getNumero() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idProposicao = rs.getInt("idProposicao");
			return idProposicao;
		}	
		
		return idProposicao;
		
	}
	
	public int procurarLei(Proposicao proposicao) throws SQLException{
		
		int idProposicao = 0;
		String sql = "SELECT idProposicao FROM proposicao INNER JOIN lei_ordinaria ON Proposicao_idProposicao = idProposicao" +
					" WHERE numeroProposicao = '" + proposicao.getNumero() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idProposicao = rs.getInt("idProposicao");
			return idProposicao;
		}	
		
		return idProposicao;
		
	}
	
	public int procurarStatus (Proposicao proposicao) throws SQLException{
		
		int idStatus = 0;
		String sql = "SELECT idStatus FROM status WHERE localizacao = '" + proposicao.getLocalizacao() 
				+ "' and situacaoTramite = '" + proposicao.getSituacaoTramite()	+ "'";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idStatus = rs.getInt("idStatus");
			return idStatus;
		}	
		
		return idStatus;
		
	}
	
	public int	inserirStatus(Proposicao proposicao) throws SQLException{
		
		int idStatus = this.procurarStatus(proposicao);		
		
		if (idStatus != 0){
			return idStatus;
		}
		
		String sql = "INSERT INTO status (situacaoTramite, localizacao) VALUES (" 
					+ "'" + proposicao.getSituacaoTramite() + "'"
					+ ",'" + proposicao.getLocalizacao() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		idStatus = st.executeUpdate(sql,1);
		ResultSet rs = st.getGeneratedKeys();
        if (rs.next()){
        	idStatus = rs.getInt(1);
        }
        rs.close();
		return idStatus;
		
	}
	
	public int inserirProposicao(Proposicao proposicao) throws SQLException, ClassNotFoundException{
		
		conn = Connection.connect();		
		int idStatus = this.inserirStatus(proposicao);
		
		String sql = "INSERT INTO proposicao (texto, justificativa, dataPublicacao, numeroProposicao, idStatus, url, idDeputado) VALUES ("
				     + "'" + proposicao.getDescricaoCompleta()  + "', "
				     + "'" + proposicao.getJustificativa() + "', "
				     + "'" + proposicao.getDataPublicacao() + "', "
				     + "'" + proposicao.getNumero() + "', "
				     + idStatus + ","
				     + "'" + proposicao.getUrl() + "', "
				     + proposicao.getIdAutor() + ")";
		Statement st = conn.createStatement();
		System.out.println(sql);
		int idProposicao = 0;
		st.executeUpdate(sql,1);
		ResultSet rs = st.getGeneratedKeys();
        if (rs.next()){
        	idProposicao = rs.getInt(1);
        }
        rs.close();
		proposicao.setIdProposicao(idProposicao);
		System.out.println(proposicao.getTipoProp());
		if (proposicao.getTipoProp().contains("Lei Ordinária") || proposicao.getTipoProp().contains("Lei Complementar")|| proposicao.getTipoProp().contains("Emenda")){
			idProposicao = this.InserirLei(proposicao);
		}
		
		conn.close();
		return idProposicao;
	}

	private int InserirLei(Proposicao proposicao) throws SQLException {
		
		String sql = "INSERT INTO lei_ordinaria (Proposicao_idProposicao, resultadoFinal, resumo) VALUES ("
			     + "'" + proposicao.getIdProposicao()  + "', "
			     + "'" + proposicao.getRedacaoFinal() + "', "
			     + "'" + proposicao.getDescricaoCurta() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		int idProposicao = st.executeUpdate(sql,1);
		proposicao.setIdProposicao(idProposicao);
		this.inserirDiscussoes(proposicao);
		
		return idProposicao;
	}
	
	private int procurarSessao(String data) throws SQLException {
		
		int idSessaoPlenaria = 0;
		String sql = "SELECT idSessaoPlenaria FROM sessaoplenaria WHERE dataSessao = " + data;
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);		
		while (rs.next()) {
			idSessaoPlenaria = rs.getInt("idSessaoPlenaria");
			return idSessaoPlenaria;
		}	
		
		return idSessaoPlenaria;
	}

	private int InserirSessao(String data) throws SQLException {
		
		int idSessao = this.procurarSessao(data);		
		
		if (idSessao != 0){
			return idSessao;
		}
		
		String sql = "INSERT INTO sessaoplenaria (dataSessao) VALUES ("+ data + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		idSessao = st.executeUpdate(sql,1);		
		return idSessao;
	}
	
	private void inserirDiscussoes(Proposicao prop) throws SQLException {
		
		for (String data: prop.getResultadoDiscussoes().keySet()) {
			
			int idSessao = this.InserirSessao(data);
			if (idSessao != 0){
				continue;
			}
			else{
				String sql = "INSERT INTO discussao_lei (idSessaoPlenaria,idProposicao,resultadoSessaoPlenaria) VALUES ("
						+ idSessao + ", " + prop.getIdProposicao() + ", '" + prop.getResultadoDiscussoes().get(data) +"')";
				Statement st = conn.createStatement();
				System.out.println(sql);
				idSessao = st.executeUpdate(sql,1);		
			}		
			
		}
	}	
}
