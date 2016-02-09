import java.sql.Date;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.HashMap;


public class Proposicao {
	
	private int idProposicao;
	private String tipoProp;
	private String numero;
	private String url;
	private int idAutor;
	private String descricaoCurta;
	private String descricaoCompleta;
	private String justificativa;
	private String situacaoTramite;
	private String localizacao;
	private Date dataPublicacao;
	private Date dataInsercao;
	private String redacaoFinal;	
	private HashMap<String,String> resultadoDiscussoes = new HashMap<String,String>(); //<data,resultado>
	
	public String getUrl() {
		return url;
	}
	public void setUrl(String url) {
		this.url = url;
	}
	
	public String getRedacaoFinal() {
		return redacaoFinal;
	}
	public void setRedacaoFinal(String redacaoFinal) {
		this.redacaoFinal = redacaoFinal;
	}
	public Date getDataPublicacao() {
		return dataPublicacao;
	}
	public void setDataPublicacao(String dataPublicacao) {
		if(dataPublicacao.contains("		")){
			System.out.print("");
		}
		
		else{
			SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");		
			java.util.Date parsed;
			try {
				parsed = sdf.parse(dataPublicacao);
				this.dataPublicacao = new Date(parsed.getTime());
			} catch (ParseException e) {
				e.printStackTrace();
			}
		}
	}
	public Date getDataInsercao() {
		return dataInsercao;
	}
	public void setDataInsercao(String dataInsercao) {
		
		if(dataInsercao.contains("  ")){

		}
		
		else{
			SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy");		
			java.util.Date parsed;
			try {
				parsed = sdf.parse(dataInsercao);
				this.dataInsercao = new Date(parsed.getTime());
			} catch (ParseException e) {
				e.printStackTrace();
			}
		}
	}
	public HashMap<String, String> getResultadoDiscussoes() {
		return resultadoDiscussoes;
	}
	public void setResultadoDiscussoes(HashMap<String, String> resultadoDiscussoes) {
		this.resultadoDiscussoes = resultadoDiscussoes;
	}
	public String getTipoProp() {
		return tipoProp;
	}
	public void setTipoProp(String tipoProp) {
		this.tipoProp = tipoProp;
	}
	public String getNumero() {
		return numero;
	}
	public void setNumero(String numero) {
		this.numero = numero;
	}
	public String getDescricaoCurta() {
		return descricaoCurta;
	}
	public void setDescricaoCurta(String descricaoCurta) {
		this.descricaoCurta = descricaoCurta;
	}
	public String getDescricaoCompleta() {
		return descricaoCompleta;
	}
	public void setDescricaoCompleta(String descricaoCompleta) {
		this.descricaoCompleta = descricaoCompleta;
	}
	public String getJustificativa() {
		return justificativa;
	}
	public void setJustificativa(String justificativa) {
		this.justificativa = justificativa;
	}
	public String getSituacaoTramite() {
		return situacaoTramite;
	}
	public void setSituacaoTramite(String situacaoTramite) {
		this.situacaoTramite = situacaoTramite;
	}
	public String getLocalizacao() {
		return localizacao;
	}
	public void setLocalizacao(String localizacao) {
		this.localizacao = localizacao;
	}
	public int getIdAutor() {
		return idAutor;
	}
	public void setIdAutor(int idAutor) {
		this.idAutor = idAutor;
	}
	public int getIdProposicao() {
		return idProposicao;
	}
	public void setIdProposicao(int idProposicao) {
		this.idProposicao = idProposicao;
	}
	
	

}
